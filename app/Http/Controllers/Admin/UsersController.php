<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortUser;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users=(new UserService())->getAllUsers();
        return view('admin.pages.users.index',[
            'users'=>collect($users)->map(function($user) {
                return new ShowShortUser($user);
            })
            ]);
    }
}
