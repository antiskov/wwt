<?php

namespace App\Http\Controllers;

use App\Services\DialogsService;
use Illuminate\Http\Request;

class DialogsController extends Controller
{
    public function show($id = null, DialogsService $service)
    {
        return view('profile_user.pages.my_messages');
    }
}
