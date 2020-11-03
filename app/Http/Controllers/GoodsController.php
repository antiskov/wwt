<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertImage;
use App\Services\AdvertsService;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index(Advert $advert)
    {
        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }
        //dd($advert->advertImages->full_path);
        foreach ($advert->advertImages as $advertImage) {
            dump($advertImage->full_path);
        }
        //dd(asset('/storage/'.$advertImage->full_path));

        return view('pages.item-page', [
            'role' => $role,
            'advert' => $advert,
        ]);
    }
}
