<?php


namespace App\Services;


use App\Contracts\AdvertCreator;
use App\Contracts\AdvertsInterface;
use App\DataObjects\WatchEntity;
use App\Domain\WatchesAdvertCreator;
use App\Exceptions\UnknownAdvertTypeException;

class AdvertsService
{
    public function getCreatorId(AdvertsInterface $advert)
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
                throw new UnknownAdvertTypeException();
        }
        return $creator;
    }
}
