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
use Illuminate\Support\Facades\Log;

class AdvertWatchMaker extends AdvertTools implements AdvertInterface
{
    public function __construct(WatchAdvertRequest $request, Advert $advert)
    {
        $this->request = $request;
        $this->advert = $advert;
    }

    public function createWatchMake()
    {
        $this->watchMake =  WatchMake::where('title', $this->request->brand)->first();
        if(!$this->watchMake){
            $this->watchMake = new WatchMake();
            $this->watchMake->title = $this->request->brand;
            $this->watchMake->is_moderated = 0;
            if (!$this->watchMake->save()) {
                Log::info("WatchMake not saved");
            }
        }

    }

    public function createWatchModel()
    {
        $this->watchModel = WatchModel::where('model_code', $this->request->model_code)->first();
        if(!$this->watchModel){
            $this->watchModel = new WatchModel();
            $this->watchModel->title =  $this->request->model;
            $this->watchModel->save();
            if (!$this->watchModel->save()) {
                Log::info("WatchModel not saved");
            }
        }
    }

    public function makeDraft():void
    {
//        dd(333);
        $this->createWatchMake();
        $this->createWatchModel();
        $this->recordAdvert('watch');
        $this->setBasicPhotoAdvert($this->request->input('main_photo'));

        $watchAdvert =  WatchAdvert::where('advert_id', $this->advert->id)->first();
        if(!$watchAdvert){
            $watchAdvert = new WatchAdvert();
            $watchAdvert->advert()->associate($this->advert);
        }

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
        if (!$watchAdvert->save()) {
            Log::info("WatchAdvert #$watchAdvert->id not saved");
        }
    }

    public function getResult():Advert
    {
        return $this->advert;
    }
}
