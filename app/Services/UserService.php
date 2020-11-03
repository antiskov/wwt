<?php


namespace App\Services;

use App\Contracts\ICreateUser;
use App\DataObjects\Admin\UpdateUser;
use App\Exceptions\EmailCodeValidException;
use App\Mail\RegisterEmail;
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
        $user->email_verification_code = Hash::make(Str::random(5), ['rounds' => 6]); //Hash::make($request->getEmailVerificationCode()):
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
        /*$user->password = Hash::make($request->getPassword());*/

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
        $codeEmail = route('activation_link', [$user->email_verification_code]);
        $checkSend = Mail::to($user)->send(new RegisterEmail($codeEmail));
        if ($checkSend != NULL) {
            throw new EmailCodeValidException();
        }
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
            $setting->receive_service_info = $request->receive_service_info;
            $setting->receive_partners_adverts = $request->receive_service_info;
            if ($request->language_communication == 'Русский') {
                $setting->language_communication = 'ru';
            } else {
                $setting->language_communication = 'en';
            }
            $setting->save();
        } else {
            $setting = new UserSettings();
            $setting->user()->associate(auth()->user());
            $setting->receive_service_info = $request->receive_service_info;
            $setting->receive_partners_adverts = $request->receive_service_info;
            $setting->language_communication = $request->language_communication;
            $setting->save();
        }

        return $setting;
    }

    public function checkAutoLogin() {
        $check = 0;
        foreach (array_keys($_COOKIE) as $value) {
            if (mb_substr($value, 0, 12) == 'remember_web') {
                $check = 1;
            }
        }

        return $check;
    }

}
