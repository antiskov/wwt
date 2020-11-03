<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
}
