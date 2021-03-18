<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
    /**
     * @param string $language
     * @return RedirectResponse
     */
    public function setLocal(string $language): RedirectResponse
    {
        Session::put('language', $language);
        App::setLocale(Session::get('language'));

        return redirect()->back();
    }
}
