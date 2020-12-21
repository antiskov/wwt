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
    //todo: saves chack and errors checker
    protected function recordAdvert($type)
    {
        $this->advert->type = $type;
        $this->advert->user()->associate(auth()->user());
        $this->advert->title = $this->createAdvertName($type);
        $this->advert->description = $this->request->description;
        $this->advert->price_rate = $this->setPriceRate();
        $this->advert->price = $this->setPrice();
        $this->advert->currency_id = Currency::where('title', $this->request->currency)->first()->id;
        $this->advert->surname = $this->request->surname;
        $this->advert->name = $this->request->name;
        $this->advert->birthday = $this->request->birthday;
        $this->advert->phone = $this->request->phone;
        $this->advert->country = $this->request->country;
        $this->advert->country = $this->request->country;
        $this->advert->city = $this->request->city;
        $this->advert->region = $this->request->region;
        $this->advert->street = $this->request->street;
        $this->advert->zip_code = $this->request->zip_code;
//        dd($this->request->street_additional);
        $this->advert->street_additional = $this->request->street_additional;
        $this->advert->delivery_volume = $this->request->deliveryVolume;
        $this->advert->latitude = $this->request->lat;
        $this->advert->longtitude = $this->request->lng;

        if($this->request->hide_surname == 1){
            $this->advert->hide_surname = $this->request->hide_surname;
        } else {
            $this->advert->hide_surname = 0;
        }

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
        if($oldBasicPhoto = AdvertPhoto::where('is_basic', 1)->first()){
            $oldBasicPhoto->is_basic = 0;
            $oldBasicPhoto->save();
        }

        $photo = AdvertPhoto::where('id', $photoId)->first();
        $photo->is_basic = 1;
        $photo->save();
    }

    public function setPrice()
    {
        return $this->request->price / $this->advert->price_rate;
    }
    //todo: refactor to one query
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
