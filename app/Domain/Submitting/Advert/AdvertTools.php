<?php

namespace App\Domain\Submitting\Advert;

use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Currency;
use App\Models\ExchangeRate;

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
        $this->advert->price_rate = $this->setPriceRate();
        $this->advert->price = $this->setPrice();

        $this->advert->currency_id = Currency::where('title', $this->request->currency)->first()->id;

        $this->advert->save();

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

    public function setBasicPhotoAdvert($photoId)
    {
        $photo = AdvertPhoto::where('id', $photoId)->first();
        $advert = $photo->advert;

        foreach ($advert->photos as $thisPhoto){
            $thisPhoto->is_basic = 0;
            $thisPhoto->save();
        }

        $photo->is_basic = 1;
        $photo->save();
    }

    public function setPrice()
    {
        $price = $this->request->price / $this->advert->price_rate;

        return $price;
    }

    public function setPriceRate()
    {
        if($this->request->currency == 'EUR'){
            $eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()->rate;
            $usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
            $rate = $eur / $usd;
        } elseif ($this->request->currency == 'UAH') {
            $rate = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
        } elseif ($this->request->currency == 'USD') {
            $rate = 1;
        }
        return $rate;
    }
}
