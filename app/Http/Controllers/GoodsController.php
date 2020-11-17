<?php

namespace App\Http\Controllers;

use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\SparePartsMechanismType;
use App\Models\User;

class GoodsController extends Controller
{
    public function index(User $user, Advert $advert)
    {

        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        $mechanismType = MechanismType::where('id', $advert->watchAdvert->mechanism_type_id)->first();

        $userLanguages = [];
        foreach ($user->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return view('catalog.pages.item-page', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userLanguages,
        ]);
    }

    public function indexAccessory(User $user, Advert $advert)
    {
        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }
//        dd($advert->accessoryAdvert->accessory_mechanism_type_id);
        $mechanismType = AccessoryMechanismType::where('id', $advert->accessoryAdvert->accessory_mechanism_type_id)->first();

        $userLanguages = [];
        foreach ($user->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return view('catalog.pages.item-page-accessory', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userLanguages,
        ]);
    }

    public function indexSpareParts(User $user, Advert $advert)
    {
        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        $mechanismType = SparePartsMechanismType::where('id', $advert->sparePartsAdvert->spare_parts_mechanism_type_id)->first();

        $userLanguages = [];
        foreach ($user->languages as $l) {
            $userLanguages[] = $l->code;
        }

        return view('catalog.pages.item-page-spare-parts', [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userLanguages,
            'user' => $user,
        ]);
    }

}
