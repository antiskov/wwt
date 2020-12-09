<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Locale;
use Closure;

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
        if(\Cookie::has('language')){
            App::setLocale(Cookie::get('language'));
        } else {
            Cookie::queue(Cookie::make('language', config('app.locale')));
            App::setLocale('app.locale');

            return $next($request);
        }

        return $next($request);

    }
}
