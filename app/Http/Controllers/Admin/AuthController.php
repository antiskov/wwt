<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showlogin');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard() {
        return view('admin.pages.dashboard');
    }
}
