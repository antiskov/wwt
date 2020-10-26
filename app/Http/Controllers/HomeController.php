<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }
}
