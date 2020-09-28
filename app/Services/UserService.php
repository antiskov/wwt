<?php


namespace App\Services;


class UserService
{
    public function getRole($user)
    {
        return $user->role->title;
    }
}
