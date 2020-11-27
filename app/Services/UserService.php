<?php


namespace App\Services;

use App\Contracts\ICreateUser;
use App\DataObjects\Admin\UpdateUser;
use App\Exceptions\EmailCodeValidException;
use App\Mail\ActivationMail;
use App\Mail\RegisterEmail;
use App\Models\UserReferral;
use App\Models\UserSettings;
use Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @param $user
     * @return mixed
     */
    public function getRole($user)
    {
        return $user->role;
    }

    /**
     * @return User[]|Collection
     */
    public function getAllUsers()
    {
        return User::all();
    }

    /**
     * @param ICreateUser $request
     * @return User|false
     */
    public function create(ICreateUser $request)
    {
        Log::info('in user service creation');
        $user = new User();
        $user->email = $request->getEmail();
        $user->email_verification_code = Str::random(10);
        $user->name = $request->getName();
        $user->surname = $request->getSurname();
        $user->role_id = $request->getRole();
        $user->password = Hash::make($request->getPassword());
        $user->referral_code = $request->getReferralCode();
        $user->is_active = $request->getActivity();
        if (!$user->save()) {
            Log::info('user not saved');
            return false;
        }
        $user->latitude = 2;
        $user->longtitude = 2;

        $this->setUserReferral($user);

        return $user;
    }

    /**
     * @param $user
     * @param UpdateUser $request
     * @return false
     */
    public function update($user, UpdateUser $request)
    {
        $user->name = $request->getName();
        $user->surname = $request->getSurname();

        if (!$user->save()) {
            return false;
        }

        return $user;
    }

    /**
     * @param $user
     * @throws EmailCodeValidException
     */
    public function sendVerificationCode($user)
    {
        $data['codeEmail']=route('activation_link', [$user->email_verification_code]);
        Mail::to($user->email)->send(new ActivationMail($user));
        Log::info('mail sended');

        /*dd($result);
        $checkSend = Mail::to($user)->send(new RegisterEmail($user));*/
        return true;
    }

    public function setActivity(User $user)
    {
        $user->is_active = 1;
        $user->save();
    }

        public function setSetting(Request $request)
    {
        if(!$request->stay_logged_in) {
            foreach (array_keys($_COOKIE) as $value) {
                if (mb_substr($value, 0, 12) == 'remember_web') {
                    Cookie::queue(Cookie::forget($value));
                }
            }
        } else {
            \Auth::login(auth()->user(), true);
        }

        if ($setting = UserSettings::where('user_id', auth()->user()->id)->first()) {
            $setting->receive_service_info = $request->receive_service_info ? 1 : 0;
            $setting->receive_partners_adverts = $request->receive_partners_adverts ? 1 : 0;
            if ($request->language_communication == 'Русский') {
                $setting->language_communication = 'ru';
            } else {
                $setting->language_communication = 'en';
            }
            $setting->save();
        } else {
            $setting = new UserSettings();
            $setting->user()->associate(auth()->user());
            $setting->receive_service_info = $request->receive_service_info ? 1 : 0;
            $setting->receive_partners_adverts = $request->receive_service_info ? 1 : 0;
            $setting->language_communication = $request->language_communication ? 1 : 0;
            $setting->save();
        }

        return $setting;
    }

    public function check() {
        $check = [];
        foreach (array_keys($_COOKIE) as $value) {
            if (mb_substr($value, 0, 12) == 'remember_web') {
                $check['remember'] = 1;
            } else {
                $check['remember'] = 0;
            }
        }
        if($settings = UserSettings::where('user_id', auth()->user()->id)->first()) {
            $check['receive_service_info'] = $settings->receive_service_info;
            $check['receive_partners_adverts'] = $settings->receive_partners_adverts;
            $check['language_communication'] = $settings->language_communication;
        } else {
            $check['receive_service_info'] = 0;
            $check['receive_partners_adverts'] = 0;
            $check['language_communication'] = 0;
        }


        return $check;
    }

    public function userLanguages(User $user)
    {
        $userLanguages = [];
        foreach ($user->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return $userLanguages;
    }

    public function setUserReferral(User $referralUser)
    {
        if(Cookie::get('referral_code')){
            $user = User::where('referral_code', Cookie::get('referral_code'))->first();
            $referral = new UserReferral();
            $referral->user_id = $user->id;
            $referral->referral_user_id = $referralUser->id;
            $referral->save();
        }
    }

}
