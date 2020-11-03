<?php


namespace App\Services;


use App\Contracts\AdvertsInterface;
use App\Models\Advert;
use App\Models\Status;

class AdvertsService
{
    public function getCreatorId(AdvertsInterface $advert)
    {
        return $advert->getUserId();
    }

    public function getAllAdverts()
    {
        return Advert::all();
    }

    public function changeStatus($status, Advert $advert)
    {
        $advert->status_id = $status;
        $advert->save();
    }

    public function deleteAdvert(Advert $advert)
    {
        $advert->delete();
    }
}
