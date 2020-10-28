<?php


namespace App\Services;

use App\Contracts\ICreateUser;
use App\DataObjects\Admin\UpdateUser;
use App\Exceptions\NotImplementedException;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Log;
use App\Contracts\IShowUser;
use App\DataObjects\Admin\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    public function getRole($user)
    {
        return $user->role->title;
    }
    public function getAllUsers()
    {
        return User::all();
    }
    public function create(ICreateUser $request)
    {
        Log::info('in user service creation');
        $user = new User();
        $user->email = $request->getEmail();
        $user->email_verification_code = \Hash::make(Str::random(5)); //Hash::make($request->getEmailVerificationCode()):
        $user->name = $request->getName();
        $user->surname = $request->getSurname();
        $user->role_id = $request->getRole();
        $user->password = \Hash::make($request->getPassword());
        $user->referral_code=$request->getReferralCode();
        $user->is_active=$request->getActivity();
        if (!$user->save()) {
            Log::info('user not saved');
            return false;
        }

        return $user;
    }
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

    public function sendVerificationCode($user)
    {
        throw new NotImplementedException();
    }

    public function sendEmailRegister($user) {
        $codeEmail = $_SERVER['HTTP_HOST'] . '/email_verification_code/' . $user->email_verification_code;

        Mail::to($user)->send(new RegisterEmail($codeEmail));
    }

    public function setActivity(User $user) {
        $user->update(['is_active' => true]);
    }

}
