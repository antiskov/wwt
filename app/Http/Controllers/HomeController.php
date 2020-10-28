<?php

namespace App\Http\Controllers;


use App\DataObjects\RegisterUser;
use App\Services\ImageMinificationService;
use App\Models\User;
use App\Services\SecurityService;
use App\Services\UserService;

class HomeController extends Controller
{
    public function main()
    {;
        return view('pages.main');
    }

    public function test(ImageMinificationService $req)
    {
        $req->minify('public/yoda.png', ['medium', 'big', 'small']);

        return view('pages.main');
    }

    public function t2(string $email)
    {
        $pass = new SecurityService();
        $user = User::where('email', '=', $email)->first();
        $pass->resetPassword($user);

        return view('pages.main');
    }

    public function emailVerificationCode($email_verification_code) {
        $user = User::where('email_verification_code', '=', $email_verification_code)->first();
        $emailCode = new UserService();
        $emailCode->setActivity($user);

        return redirect()->route('home');
    }
}
