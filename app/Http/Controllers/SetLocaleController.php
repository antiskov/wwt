<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
    /**
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLocal(string $language) {
        Session::put('language', $language);
        App::setLocale(Session::get('language'));

        return redirect()->back();
    }
}
