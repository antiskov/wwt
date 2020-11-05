<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Mail\TestMail;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AjaxController extends Controller
{
    public function checkLoginEmail(CheckEmailRequest $request)
    {
        $user = User::where('email', "=", $request->email)->first();
        if ($user) {
            $data = [
                'status' => 'success',
                'email' => $request->email,
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => __('no user found'),
            ];
        }

        return response()->json($data);
    }

    public function authUser(LoginFormRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        \Cookie::queue(\Cookie::forget('remember'));
        setcookie('remember', $remember ? 1 : 0);

        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1], $remember)) {
            $data = [
                'status' => 'success',
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => __('wrong username or password, or not active account'),
            ];
        }
        return response()->json($data);
    }

    public function registerUser(RegisterFormRequest $request, UserService $userService)
    {



        $user = $userService->create($request->getDto());
        return response()->json($userService->sendVerificationCode($user));
    }
}
