<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        \Log::info($request->email.' '.$request->password);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            \Log::info('logged in');
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with(
            'error','worng login or password'
        );
    }

    public function logout()
    {
        Auth::logout();
    }
}
