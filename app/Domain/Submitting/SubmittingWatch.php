<?php

namespace App\Domain\Submitting;

use App\Contracts\SubmittingInterface;
use App\Http\Requests\SubmittingRequest;
use App\Models\Sex;
use App\Models\WatchAdvert;
use App\Models\WatchType;

class SubmittingWatch extends ToolsForSub  implements SubmittingInterface
{

    public function __construct(SubmittingRequest $request)
    {
        $this->request = $request;
    }
    public function init(){
        $advert = $this->createAdvert();

        if($model_code = $this->request->input('model_code', false)){
            $watch_advert = new WatchAdvert();
            $watch_advert->advert()->associate($advert);
            $watch_advert->model_code = $model_code;
            $watch_advert->save();
        }
    }

    public function getInfo()
    {
        $infoArr = [];
        if($this->request->model_code){
            $infoArr['model_code'] = $this->request->model_code;
        }
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = ['with box', 'with original documents', 'with original documents and box'];
        $infoArr['states'] = ['new', 'used'];
        $infoArr['sexes'] = Sex::all();

        return $infoArr;
    }
}
