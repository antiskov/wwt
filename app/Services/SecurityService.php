<?php


namespace App\Services;


use App\Contracts\AdvertsInterface;
use App\Models\User;

class SecurityService
{
    public function can(User $user,AdvertsInterface $advert)
    {
        $role=(new UserService())->getRole($user);

        if($user->id==$advert->user_id || $role=='admin' || $role=='manager') {
            return true;
        }

        return false;
    }
}
