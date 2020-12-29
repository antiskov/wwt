<?php

namespace App\Domain\Submitting\Advert;


use App\Contracts\Submitting\AdvertInterface;
use App\Models\Advert;

abstract class AdvertAbstract
{
    public $request;
    public $advert;

    abstract public function getType():AdvertInterface;

    public function get():Advert
    {
        $advert = $this->getType();
        $advert->makeDraft();

        return $advert->getResult();
    }
}
