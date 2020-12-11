<?php

namespace App\Domain\Submitting\Advert;

use App\Contracts\Submitting\AdvertInterface;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\WatchMake;
use App\Models\WatchModel;
use App\Models\WatchType;

class AdvertWatchMaker extends AdvertTools implements AdvertInterface
{
    public function __construct(WatchAdvertRequest $request, Advert $advert)
    {
        $this->request = $request;
        $this->advert = $advert;
    }

    public function makeDraft():void
    {
        $this->recordAdvert();

        $watchAdvert = $this->advert->watchAdvert;
        $watchAdvert->watch_type_id  = WatchType::where('title', $this->request->watchType)->first()->id;
        $watchAdvert->watch_make_id  = WatchMake::where('title', $this->request->brand)->first()->id;
        $watchAdvert->watch_make_id  = WatchModel::where('title', $this->request->brand)->first()->id;
        $watchAdvert->save();
    }

    public function getResult():Advert
    {
        return $this->advert;
    }
}
