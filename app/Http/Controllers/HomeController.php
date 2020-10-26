<?php

namespace App\Http\Controllers;

use App\Services\ImageMinificationService;
use Illuminate\Http\Request;

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
}
