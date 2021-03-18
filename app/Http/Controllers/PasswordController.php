<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePasswordRequest;
use App\Models\User;
use App\Services\PasswordService;
use App\Services\UserService;
use Auth;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PasswordController
{
    public function __construct()
    {
        Auth::logout();
    }

    /**
     * @return Application|Factory|View
     */
    public function resetPasswordIndex()
    {
        return view('password.reset_password');
    }

    /**
     * @param ManagePasswordRequest $request
     * @param PasswordService $passwordService
     * @param UserService $userService
     * @return RedirectResponse
     */
    public function resetPasswordStore(ManagePasswordRequest $request, PasswordService $passwordService, UserService $userService): RedirectResponse
    {
        $user = $userService->getUserByEmail($request->input('email'));

        if ($user->count() < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        if ($user) {
            $response = $passwordService->resetPassword($request);
            return redirect()->back()->with($response[0], trans($response[1]));
        }else {
            return redirect()->back()->withErrors(['error' => trans('Incorrect email')]);
        }
    }

    /**
     * @param $token
     * @return Application|Factory|View
     */
    public function resetPasswordToken($token)
    {
        if ($passwordReset = DB::table('password_resets')->where('token', $token)->first()) {
            return view('password.new_password', ['email' => $passwordReset->email]);
        }
    }

    /**
     * @param ManagePasswordRequest $request
     * @return RedirectResponse
     */
    public function saveNewPassword(ManagePasswordRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();
        if ($user && strlen($request->password) >= 8 && $request->password == $request->repeat_password) {
            $user->password = Hash::make($request->password);
            $user->save();
        } else {
            return redirect()->route('home')->with('status_password', trans(__('messages.not_changed_pass')));
        }

        return redirect()->route('home')->with('status_password', trans(__('messages.changed_pass')));
    }
}
