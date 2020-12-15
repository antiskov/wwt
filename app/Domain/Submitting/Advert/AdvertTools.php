<?php

namespace App\Domain\Submitting\Advert;

use App\Models\Advert;

class AdvertTools
{
    protected $advert;
    protected $request;
    public $watchMake;
    public $watchModel;

    protected function recordAdvert($type)
    {
        $this->advert->type = $type;
        $this->advert->user()->associate(auth()->user());
        $this->advert->title = $this->createAdvertName($type);
        $this->advert->description = $this->request->description;

        $this->advert->save();
    }

    public function createAdvertName($type)
    {
        if($type == 'watch'){
            return $this->watchMake->title.' '.$this->watchModel->title.' '.$this->watchModel->model_code;
        }
    }

    protected function createAdvert():Advert
    {
        $advert = new Advert();
        $advert->user()->associate(auth()->user());
        $advert->title = 'none';
        $advert->currency_id = 1;
        $advert->photo = 'none';
        $advert->vip_status = 0;
        $advert->status_id = 4;
        $advert->save();

        return $advert;
    }
}
