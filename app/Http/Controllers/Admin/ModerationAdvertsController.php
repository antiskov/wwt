<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ModerationAdvertsController extends Controller
{
    public function index()
    {
        return view('admin.pages.moderation_adverts');
    }
}
