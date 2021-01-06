<?php


namespace App\Services;

use App\Contracts\ICreateUser;
use App\DataObjects\Admin\UpdateUser;
use App\Exceptions\EmailCodeValidException;
use App\Mail\ActivationMail;
use App\Mail\RegisterEmail;
use App\Models\Subscription;
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
        }

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
        $data['codeEmail'] = route('activation_link', [$user->email_verification_code]);
        Mail::to($user->email)->send(new ActivationMail($user));
        Log::info('mail sended');

        return true;
    }

    public function setActivity(User $user)
    {
        $user->is_active = 1;
        if (!$user->save()) {
            Log::info('user not activation');
        }
    }

    public function getLanguageKey(Request $request)
    {
        if ($request->language_communication == __('messages.russian')) {
            return 'ru';
        } else {
            return 'en';
        }
    }

    public function setSetting(Request $request, SubscribeService $subscribeService)
    {
        if (!$request->stay_logged_in) {
            foreach (array_keys($_COOKIE) as $value) {
                if (mb_substr($value, 0, 12) == 'remember_web') {
                    Cookie::queue(Cookie::forget($value));
                }
            }
        } else {
            \Auth::login(auth()->user(), true);
        }

        $setting = UserSettings::where('user_id', auth()->user()->id)->first();
        if ($setting) {
            $setting->receive_partners_adverts = $request->receive_partners_adverts ? 1 : 0;
            $setting->language_communication = $this->getLanguageKey($request);
            if (!$setting->save()) {
                Log::info('setting not saved');
            }
        } else {

            $setting = new UserSettings();
            $setting->user()->associate(auth()->user());
            $setting->receive_partners_adverts = $request->receive_service_info ? 1 : 0;
            $setting->language_communication = $request->language_communication ? 1 : 0;
            if (!$setting->save()) {
                Log::info('setting not saved');
            }
        }

        if ($request->receive_service_info == 'on') {
            $subscribeService->changeSubscribe(auth()->user()->email, 1);
        } else {
            $subscribeService->changeSubscribe(auth()->user()->email, 0);
        }

        return $setting;
    }


    /**
     * @return array
     */
    public function getSettings()
    {
        $check = [];

        foreach (array_keys($_COOKIE) as $value) {
            if (mb_substr($value, 0, 12) == 'remember_web') {
                $check['remember'] = 1;
            }
        }

        if ($settings = UserSettings::where('user_id', auth()->user()->id)->first()) {
            $check['receive_partners_adverts'] = $settings->receive_partners_adverts;
            $check['language_communication'] = $settings->language_communication;
        } else {
            $check['receive_partners_adverts'] = 0;
            $check['language_communication'] = 0;
        }

        $subscribe = Subscription::where('email', auth()->user()->email)->first();

        if (isset($subscribe->status) && $subscribe->status == 1) {
            $check['receive_service_info'] = 1;
        } else {
            $check['receive_service_info'] = 0;
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
        if (Cookie::get('referral_code')) {
            $user = User::where('referral_code', Cookie::get('referral_code'))->first();

            $referralUser->referral_user_id = $user->id;
            if (!$referralUser->save()) {
                Log::info('referral now activation');
            }
        }
    }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

}
