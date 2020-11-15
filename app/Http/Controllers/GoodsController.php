<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\MechanismType;

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

        $userLanguages = [];
        foreach (auth()->user()->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return view('catalog.pages.item-page', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userLanguages,
        ]);
    }

    public function indexAccessory(Advert $advert)
    {
        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }
//        dd($advert->accessoryAdvert->accessory_mechanism_type_id);
        $mechanismType = MechanismType::where('id', $advert->accessoryAdvert->accessory_mechanism_type_id)->first();

        $userLanguages = [];
        foreach (auth()->user()->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return view('catalog.pages.item-page-accessory', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userLanguages,
        ]);
    }
}
