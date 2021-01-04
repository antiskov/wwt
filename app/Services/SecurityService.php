<?php


namespace App\Services;


use App\Contracts\Filter;
use App\Mail\RegisterEmail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SecurityService
{
    /**
     * @param User $user
     * @param Filter $advert
     * @return bool
     */
    public function can(User $user, Filter $advert)
    {
        $role=(new UserService())->getRole($user);

        if($user->id==$advert->user_id || $role=='admin' || $role=='manager') {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @return User
     */
    public function resetPassword(User $user)
    {
        $passwordSend = Str::random(8);
        $user->forceFill([
            'password' => Hash::make($passwordSend)
        ])->save();

        Mail::to($user)->send(new WelcomeMail($passwordSend));

        return $user;
    }
}
