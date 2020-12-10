<?php

namespace App\Domain\Submitting;

use App\Models\WatchAdvert;

class SubmittingWatch extends AbstractSubmitting
{
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
        if($this->request->model_code){
            $infoArr['model_code'] = $this->request->model_code;
        }

        return $infoArr;
    }
}
