<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function login(CheckEmailRequest $request)
    {
        return redirect()->back();
    }
}
