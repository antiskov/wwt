<?php

namespace App\Contracts\Submitting;

use App\Models\Advert;

interface AdvertInterface
{
    public function makeDraft():void;

    public function getResult():Advert;
}
