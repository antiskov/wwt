<?php

namespace App\Http\Controllers;


use App\Mail\RegisterEmail;
use App\Models\User;
use App\Services\ImageMinificationService;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param UserService $user
     * @return Application|Factory|View
     */
    public function main() {
        
        return view('pages.main');
    }

    /**
     * @param ProfileService $req
     * @return Application|Factory|View
     */
    public function test(ImageMinificationService $req)
    {
        $req->minify('public/acc.jpeg', ['medium', 'big', 'small']);

        return view('pages.main');
    }
}
