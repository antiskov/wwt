<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagePasswordRequest;
use App\Models\User;
use App\Services\PasswordService;

class PasswordController
{
    public function resetPasswordIndex()
    {
        return view('password.reset_password');
    }

    public function resetPasswordStore(ManagePasswordRequest $request, PasswordService $service)
    {
        return $service->resetPassword($request);
    }

    public function resetPasswordToken($token)
    {
        if($passwordReset = DB::table('password_resets')->where('token', $token)->first()){
            return view('password.new_password', ['email' => $passwordReset->email]);
        }
    }

    public function saveNewPassword(ManagePasswordRequest $request)
    {
        if($user = User::where('email', $request->email)->first()){
            $user->password = \Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('home');
    }
}
