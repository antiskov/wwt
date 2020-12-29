<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePasswordRequest;
use App\Models\User;
use App\Services\PasswordService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class PasswordController
{
    public function __construct()
    {
        \Auth::logout();
    }

    public function resetPasswordIndex()
    {
        return view('password.reset_password');
    }

    public function resetPasswordStore(ManagePasswordRequest $request, PasswordService $passwordService, UserService $userService)
    {
        $user = $userService->getUserByEmail($request->input('email'));

        if ($user->count() < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        if ($user) {
            $response = $passwordService->resetPassword($request);
//            dd($response);
            return redirect()->back()->with($response[0], trans($response[1]));
        }else {
            return redirect()->back()->withErrors(['error' => trans('Incorrect email')]);
        }
    }

    public function resetPasswordToken($token)
    {
        if ($passwordReset = DB::table('password_resets')->where('token', $token)->first()) {
            return view('password.new_password', ['email' => $passwordReset->email]);
        }
    }

    public function saveNewPassword(ManagePasswordRequest $request)
    {
        if ($user = User::where('email', $request->email)->first()) {
            $user->password = \Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('home')->with('status_password', trans('Password has been changed.'));
    }
}
