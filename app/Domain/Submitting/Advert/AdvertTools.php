<?php

namespace App\Domain\Submitting\Advert;

class AdvertTools
{
    protected $advert;
    protected $request;

    protected function recordAdvert()
    {
//        $this->advert-> = $this->request->brand;

        $this->advert->save();
    }
}
