<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class SetLocaleController extends Controller
{
    public function setLocal(string $language) {
        $_COOKIE['language'] = $language;
        App::setLocale($_COOKIE['language']);

        return view('pages.main');
    }
}
