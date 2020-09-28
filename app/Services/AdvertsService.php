<?php


namespace App\Services;


use App\Contracts\AdvertsInterface;

class AdvertsService
{
    public function getCreatorId(AdvertsInterface $advert)
    {
        return $advert->getUserId();
    }
}
