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
        $user=User::where('email',$request->email)->first();

        if($user) {
            $data=[
                'status'=>'success',
            ];
        } else {
            $data=[
                'status'=>'error',
                'message'=>__('no_user_found')
            ];
        }
        return response()->json($data);
    }
    public function authUser(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
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
        $userService->sendEmailRegister($user);

        return response()->json($userService->sendVerificationCode($user));
    }
}
