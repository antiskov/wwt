<?php

namespace App\Http\Middleware;

use App\Models\Advert;
use Closure;
use Illuminate\Http\Request;

class SubmittingMiddleware
{
    public function handle(Request $request, Closure $next, Advert $advert)
    {
        if ($advert->user->id == auth()->user()->id){
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
