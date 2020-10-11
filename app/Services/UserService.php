<?php


namespace App\Services;


use App\Contracts\IShowUser;
use App\Models\User;

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
}
