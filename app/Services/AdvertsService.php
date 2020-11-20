<?php


namespace App\Services;


use App\Contracts\AdvertCreator;
use App\Contracts\Filter;
use App\Models\Advert;
use App\Models\Status;

use App\DataObjects\WatchEntity;
use App\Domain\WatchesAdvertCreator;
use App\Exceptions\UnknownAdvertTypeException;


class AdvertsService
{
    public function getCreatorId(Filter $advert)
    {
        return $advert->getUserId();
    }

    public function create(WatchEntity $watchEntity, AdvertCreator $creator)
    {

    }
    public function getCreator(string $type): AdvertCreator
    {
        switch ($type) {
            case 'watch':
                $creator= new WatchesAdvertCreator();
                break;
            default:
                throw new UnknownAdvertTypeException;
        }
        return $creator;
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
