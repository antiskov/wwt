<?php

namespace App\Http\Controllers;

use App\Models\Advert;

class GoodsController extends Controller
{
    public function index(Advert $advert)
    {
        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        return view('pages.item-page', [
            'role' => $role,
            'advert' => $advert,
        ]);
    }
}
