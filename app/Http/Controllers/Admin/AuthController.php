<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|RedirectResponse|View
     */
    public function showLogin()
    {
        if (Auth::check()){
            $user=User::find(auth()->user()->id);
            $role=(new UserService())->getRole($user);

            if($role->title == 'admin' || $role->title == 'manager') {
                Log::info('permitted operation by middleware');
                return redirect()->route('admin.dashboard');
            }
        }

        return view('admin.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        \Log::info($request->email.' '.$request->password);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            \Log::info('logged in');
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with(
            'error','wrong login or password'
        );
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.showlogin');
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard() {
        return view('admin.pages.dashboard');
    }
}
