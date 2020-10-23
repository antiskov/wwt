<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        foreach ($languages as $language) {
            if($language == $locale and !isset($_COOKIE['language'])) {
                setcookie('language', $language);
                Cookie::queue(Cookie::make('language', $language));
                App::setLocale($_COOKIE['language']);
                return $next($request);
            } elseif ($language == $locale and isset($_COOKIE['language'])) {
                App::setLocale($_COOKIE['language']);
                return $next($request);
            }
        }
    }
}
