<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\UserService;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $user=User::find(1);
        //$user = auth()->user();
        $role=(new UserService())->getRole($user);
        if($role->title == 'admin' || $role->title == 'manager') {
            Log::info('permitted operation by middleware');
            return $next($request);
        }
        Log::info('not permitted operation by middleware');
        return redirect()->route('admin.showlogin');
    }
}
