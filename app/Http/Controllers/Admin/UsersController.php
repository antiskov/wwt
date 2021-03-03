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
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * @param UserService $userService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserService $userService)
    {
        $users=$userService->getAllUsers();
        return view('admin.pages.users.index',[
            'users'=>collect($users)->map(function($user) { return new ShowShortUser($user); })
            ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateUser()
    {
        $roles=Role::all();
        Log::info('in show creation form');
        return view('admin.pages.users.create',[
            'roles'=>$roles
        ]);
    }

    /**
     * @param CreateUserFormRequest $request
     * @param UserService $userService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserFormRequest $request, UserService $userService)
    {

        Log::info('in user controller creation');
        $userService->create($request->getDto());

        return redirect()->back();

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditUser(User $user)
    {
        $roles=Role::all();
        return view('admin.pages.users.edit',[
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    /**
     * @param UpdateUserFormRequest $request
     * @param UserService $userService
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'name'=>'string',
            'surname'=>'string',
            'role'=>'required|numeric',
        ]);

        if (!$validator->fails()) {
            if (!User::where('email', $request->email)->first()){
                $user->email = $request->email;
            }
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->role_id = $request->role;
            $user->is_active = 1;
            if (!$user->save()) {
                Log::info('user not saved on admin panel');
            }
        }

        return redirect()->back();
    }

}
