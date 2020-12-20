<?php

namespace App\Domain\Submitting\Advert;

use App\Contracts\Submitting\AdvertInterface;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\Sex;
use App\Models\WatchAdvert;
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

    public function createWatchMake()
    {
        $watchMake =  WatchMake::where('title', $this->request->brand)->first();
        if(!$watchMake){
            $watchMake = new WatchMake();
        }
        $watchMake->title = $this->request->brand;
        $watchMake->save();
        $this->watchMake = $watchMake;
    }

    public function createWatchModel()
    {
        $watchModel = WatchModel::where('model_code', $this->request->model_code)->first();
        if(!$watchModel){
            $watchModel = new WatchModel();
        }
        $watchModel->title =  $this->request->model;
        $watchModel->save();
        $this->watchModel = $watchModel;
    }

    public function makeDraft():void
    {
        $this->createWatchMake();
        $this->createWatchModel();
        $this->recordAdvert('watch');

        if($photoId = $this->request->input('main_photo')){
            $this->setBasicPhotoAdvert($photoId);
        }

        $watchAdvert = new WatchAdvert();
        $watchAdvert->advert()->associate($this->advert);
//        $watchAdvert = $this->advert->watchAdvert;
        $watchAdvert->watch_type_id = WatchType::where('title', $this->request->watchType)->first()->id;
        $watchAdvert->watch_make_id = $this->watchMake->id;
        $watchAdvert->watch_model_id = $this->watchModel->id;
        $watchAdvert->watch_state = $this->request->state;
        $watchAdvert->model_code = $this->request->model_code;
        $watchAdvert->sex_id = Sex::where('title', $this->request->sex)->first()->id;
        $watchAdvert->release_year = $this->request->release_year;
        if($this->request->year){
            $watchAdvert->is_release_year_confirmed	= 1;
        } else {
            $watchAdvert->is_release_year_confirmed	= 0;
        }
        $watchAdvert->height = $this->request->height;
        $watchAdvert->width = $this->request->width;
        $watchAdvert->mechanism_type_id = MechanismType::where('title', $this->request->typeMechanism)->first()->id;
        $watchAdvert->save();
    }

    public function getResult():Advert
    {
        return $this->advert;
    }

    public function createAdvertName($type)
    {
        if($type == 'watch'){
            return $this->watchMake->title.' '.$this->watchModel->title.' '.$this->watchModel->model_code;
        }
    }
}
