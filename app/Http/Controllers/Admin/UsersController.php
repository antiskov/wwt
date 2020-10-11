<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserFormRequest;
use App\Models\Role;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UserService $userService)
    {
        $users=$userService->getAllUsers();
        return view('admin.pages.users.index',[
            'users'=>collect($users)->map(function($user) { return new ShowShortUser($user); })
            ]);
    }
    public function showCreateUser()
    {
        $roles=Role::all();
        return view('admin.pages.users.create',[
            'roles'=>$roles
        ]);
    }
    public function store(CreateUserFormRequest $request, UserService $userService)
    {
        $user=$userService->create($request->getDto());

        return redirect()->back();

    }
    public function showEditUser()
    {
        return view('admin.pages.users.edit');
    }
    public function update()
    {

    }

}
