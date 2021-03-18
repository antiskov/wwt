<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmailRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    /**
     * @param CheckEmailRequest $request
     * @return RedirectResponse
     */
    public function login(CheckEmailRequest $request): RedirectResponse
    {
        return redirect()->back();
    }
}
