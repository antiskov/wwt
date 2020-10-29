<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Mail\RegisterEmail;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $data=[
                'status'=>'success',
            ];
        } else {
            $data=[
                'status'=>'error',
                'message'=>__('wrong_username or password'),
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
