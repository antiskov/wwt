<?php

namespace App\Services;

use App\Models\Advert;
use Illuminate\Support\Facades\Cookie;

class FixStatusAdvert
{
    static function set($advert_id, $status_id)
    {
        Cookie::queue(Cookie::make('advert_id', $advert_id));
        Cookie::queue(Cookie::make('status_id', $status_id));

    }
    static function fix()
    {
        if (Cookie::has('advert_id')){
            $advert = Advert::find(Cookie::get('advert_id'));
            if ($advert->status_id != Cookie::get('status_id')){
                $advert->status_id = Cookie::get('status_id');
                $advert->save();
            }
            Cookie::queue(Cookie::forget('advert_id'));
            Cookie::queue(Cookie::forget('status_id'));
        }
    }
}
