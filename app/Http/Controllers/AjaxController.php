<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function checkLoginEmail(Request $request)
    {
        $user=User::where('email', "=", $request->get('email-login'))->first();
        if($user) {
            $data=[
                'status'=>'success',
                'email' => $request->get('email-login'),
            ];
        } else {
            $data=[
                'status'=>'error',
                'message'=>__('no_user_found'),
                //'email' => $request->get('email-login'),
            ];
        }
        return response()->json($data);
    }
    public function authUser(Request $request)
    {
        $email=$request->get('email');
        $password=$request->get('password');
        $remember=$request->get('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1], $remember )) {
            $data=[
                'status'=>'success',
            ];
        } else {
            $data=[
                'status'=>'error',
                'message'=>__('wrong username or password, or not active account'),
            ];
        }
        return response()->json($data);
    }
    public function registerUser(RegisterFormRequest $request,UserService $userService)
    {
        $user=$userService->create($request->getDto());

        return response()->json($userService->sendVerificationCode($user));
    }
}
