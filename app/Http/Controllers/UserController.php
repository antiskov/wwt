<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SecurityService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->back();
    }

    /**
     * @param string $email
     * @return RedirectResponse
     */
    public function resetPassword(string $email): RedirectResponse
    {
        $pass = new SecurityService();
        $user = User::where('email', '=', $email)->first();
        $pass->resetPassword($user);
        return redirect()->route('home');
    }

    /**
     * @param $email_verification_code
     * @return RedirectResponse
     */
    public function emailVerificationCode($email_verification_code): RedirectResponse
    {
        $user = User::where('email_verification_code', '=', $email_verification_code)->first();
        $emailCode = new UserService();
        $emailCode->setActivity($user);

        return redirect()->route('home');
    }
}
