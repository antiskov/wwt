<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Services\ImageMinificationService;
use App\Services\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }

    public function test(ImageMinificationService $req)
    {
        $req->minify('public/yoda.png', ['medium', 'big', 'small']);

        return view('pages.main');
    }

    public function t2(string $email) {
        $pass = new ResetPassword();
        $passwordSend = $pass->resetPassword($email);

        Mail::to($email)->send(new WelcomeMail($passwordSend));

        return view('pages.main');
    }
}
