<?php

namespace App\Http\Controllers;


use App\Services\ProfileService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function main()
    {
        //if(isset($_COOKIE['remember'])) dd($_COOKIE['remember']);

        return view('pages.main');
    }

    /**
     * @param ProfileService $req
     * @return Application|Factory|View
     */
    public function test(ProfileService $req)
    {
        $req->minify('public/yoda.png', ['medium', 'big', 'small']);

        return view('pages.main');
    }
}
