<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
    public function setLocal(string $language) {
        Session::put('language', $language);
        App::setLocale(Session::get('language'));

        return redirect()->back();
    }
}
