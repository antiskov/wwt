<?php

namespace App\Http\Controllers;


use App\Services\ImageMinificationService;
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
        return view('pages.main');
    }

    /**
     * @param ImageMinificationService $req
     * @return Application|Factory|View
     */
    public function test(ImageMinificationService $req)
    {
        $req->minify('public/yoda.png', ['medium', 'big', 'small']);

        return view('pages.main');
    }
}
