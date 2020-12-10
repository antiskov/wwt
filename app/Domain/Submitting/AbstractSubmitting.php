<?php

namespace App\Domain\Submitting;

use App\Contracts\SubmittingInterface;
use App\Http\Requests\SubmittingRequest;
use App\Models\Advert;

abstract class AbstractSubmitting implements SubmittingInterface
{
    public $request;

    public function __construct(SubmittingRequest $request)
    {
        $this->request = $request;
    }

    protected function createAdvert(){
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

    public function getInfoForStep()
    {
        $this->init();
        return $this->getInfo();
    }
}
