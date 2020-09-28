<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\UserService;
use Auth;
use Closure;
use Illuminate\Http\Request;

class IsLogginedManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()) {
            return route('admin.showlogin');
        }
        $user=User::find(Auth::id());
        $role=(new UserService())->getRole($user);
        if($role == 'admin' || $role == 'manager') {
            return $next($request);
        }
        return route('admin.showLogin');
    }
}
