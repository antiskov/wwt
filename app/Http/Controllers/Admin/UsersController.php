<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserFormRequest;
use App\Http\Requests\Admin\UpdaeUserFormRequest;
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

        return view('admin.pages.users.edit',[
            'user'=>$user
        ]);
    }
    public function update(UpdaeUserFormRequest $request, UserService $userService,User $user)
    {
        dd($user);
    }

}
