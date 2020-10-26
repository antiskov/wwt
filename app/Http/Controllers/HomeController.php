<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Locale;

class HomeController extends Controller
{
    public function main()
    {
        dump(App::getLocale());
        return view('pages.main');
    }
}
