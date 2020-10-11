<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        return redirect()->back();
    }
}
