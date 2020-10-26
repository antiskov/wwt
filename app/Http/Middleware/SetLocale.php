<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Locale;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = ['ru_RU', 'ru_UA',  'en_EN', 'ua_UA'];
        $locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);

        if (!isset($_COOKIE['language']) and in_array($locale, $languages)) {
            Session::put('language', $locale);
            App::setLocale(Session::get('language'));

            return $next($request);
        } elseif (isset($_COOKIE['language']) and in_array($locale, $languages)) {
            App::setLocale(Session::get('language'));

            return $next($request);
        } elseif (in_array($locale, $languages) == fulse) {
            App::setLocale(config('app.locale'));

            return $next($request);
        }
    }
}
