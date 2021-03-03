<?php

namespace App\Domain\Submitting\Advert;

use App\Contracts\Submitting\AdvertInterface;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;

class AdvertWatchConnector extends AdvertAbstract
{

    public function __construct(WatchAdvertRequest $request, Advert $advert)
    {
        $this->request = $request;
        $this->advert = $advert;
    }

    public function getType():AdvertInterface
    {
        return new AdvertWatchMaker($this->request, $this->advert);
    }
}
