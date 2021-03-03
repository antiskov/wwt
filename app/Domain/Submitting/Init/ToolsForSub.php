<?php

namespace App\Domain\Submitting\Init;

use App\Models\Advert;

class ToolsForSub
{
    protected $request;

    protected function createAdvert():Advert
    {
        $advert = new Advert();
        $advert->user()->associate(auth()->user());
        $advert->title = 'none';
        $advert->currency_id = 1;
        $advert->photo = 'none';
        $advert->vip_status = 0;
        $advert->status_id = 4;
        $advert->save();

        return $advert;
    }
}
