<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortAdvert;
use App\DataObjects\Admin\ShowShortUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserFormRequest;
use App\Http\Requests\Admin\UpdateUserFormRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::info('in show creation form');
        return view('admin.pages.users.create',[
            'roles'=>$roles
        ]);
    }
    public function store(CreateUserFormRequest $request, UserService $userService)
    {

        Log::info('in user controller creation');
        $userService->create($request->getDto());

        return redirect()->back();

    }
    public function showEditUser(User $user)
    {
        $roles=Role::all();
        return view('admin.pages.users.edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }
    public function update(UpdateUserFormRequest $request, UserService $userService, User $user)
    {
        $userService->update($user,$request->getDto());

        return redirect()->back();
    }

}
