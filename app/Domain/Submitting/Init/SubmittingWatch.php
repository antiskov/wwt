<?php

namespace App\Domain\Submitting\Init;

use App\Contracts\Submitting\SubmittingInterface;
use App\Domain\Submitting\Advert\AdvertTools;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Models\Currency;
use App\Models\MechanismType;
use App\Models\Sex;
use App\Models\WatchAdvert;
use App\Models\WatchType;

class SubmittingWatch extends AdvertTools implements SubmittingInterface
{
    public $advert;

    public function __construct(SubmittingRequest $request)
    {
        $this->request = $request;
    }

    public function init():void
    {
        if($model_code = $this->request->input('start_model_code', false)){
            $this->advert = $this->createAdvert();
            $watch_advert = new WatchAdvert();
            $watch_advert->advert()->associate($this->advert);
            $watch_advert->model_code = $model_code;
            $watch_advert->save();
        }
    }

    public function getInfo():array
    {
        $infoArr = [];
        if($this->request->start_model_code){
            $infoArr['model_code'] = $this->request->start_model_code;
        }
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = ['with box', 'with original documents', 'with original documents and box'];
        $infoArr['states'] = ['new', 'used'];
        $infoArr['sexes'] = Sex::all();
        $infoArr['mechanismTypes'] = MechanismType::all();
        $infoArr['currencies'] = Currency::all();

        if($this->advert) {
            $infoArr['advert'] = $this->advert;
        }

        return $infoArr;
    }
}
