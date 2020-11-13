<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\WatchModel;

class GoodsController extends Controller
{
    public function index(Advert $advert)
    {

        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        $mechanismType = MechanismType::where('id', $advert->watchAdvert->mechanism_type_id)->first();
//        dd($mechanismType->title);

        return view('pages.item-page', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
        ]);
    }
}
