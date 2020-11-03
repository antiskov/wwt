<?php

namespace App\Http\Controllers;

use App\Services\AdvertsService;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        return view('pages.item-page', ['role' => auth()->user()->role_id]);
    }
}
