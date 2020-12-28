<?php

namespace App\Domain\Submitting\Advert;

use App\Http\Controllers\PasswordController;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Log;

class AdvertTools
{
    protected $advert;
    protected $request;
    public $watchMake;
    public $watchModel;

    //todo: saves chack and errors checker. done
    protected function recordAdvert($type)
    {
        $this->advert->type = $type;
        $this->advert->user()->associate(auth()->user());
        $this->advert->title = $this->createAdvertName();
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
        $this->advert->street_additional = $this->request->street_additional;
        $this->advert->delivery_volume = $this->request->deliveryVolume;
        $this->advert->latitude = $this->request->lat;
        $this->advert->longtitude = $this->request->lng;

        if ($this->request->is_publish_surname == 1) {
            $this->advert->is_publish_surname = 0;
        } else {
            $this->advert->is_publish_surname = 1;
        }

        if (!$this->advert->save()) {
            Log::info("Advert #" . $this->advert->id . 'not saved');
        }

    }


    protected function createAdvert(): Advert
    {
        $advert = new Advert();
        $advert->user()->associate(auth()->user());
        $advert->title = 'none';
        $advert->currency_id = 1;
        $advert->photo = 'none';
        $advert->vip_status = 0;
        $advert->status_id = 4;
        if (!$advert->save()) {
            Log::info("Advert #" . $advert->id . 'not saved');
        }

        return $advert;
    }

    public function setBasicPhotoAdvert($photoId)
    {

        $oldBasicPhoto = $this->advert->photos->where('is_basic', 1)->first();

        if ($oldBasicPhoto) {
            $oldBasicPhoto->is_basic = 0;
            if (!$oldBasicPhoto->save()) {
                Log::info("AdvertPhoto #" . $oldBasicPhoto->id . 'not changed is_basic');
            }
        }

        $photos = $this->advert->photos;

        if ($photos->first()) {
            if ($photoId) {
                $photo = $photos->where('id', $photoId)->first();
                $photo->is_basic = 1;
                if (!$photo->save()) {
                    Log::info("AdvertPhoto #" . $photo->id . 'not saved');
                }
            } else {
                $advertPhoto = $this->advert->photos->first();
                $advertPhoto->is_basic = 1;
                $advertPhoto->save();
            }
        }


    }

    public function setPrice()
    {
        return $this->request->price / $this->advert->price_rate;
    }

    //todo: refactor to one query. done
    public function setPriceRate()
    {
        $currency = ExchangeRate::all();
        if ($this->request->currency == 'EUR') {
            $eur = $currency->where('pair_currencies', 'EUR/UAH')->first()->rate;
            $usd = $currency->where('pair_currencies', 'USD/UAH')->first()->rate;
            $rate = $usd / $eur;
        } elseif ($this->request->currency == 'UAH') {
            $rate = $currency->where('pair_currencies', 'USD/UAH')->first()->rate;
        } elseif ($this->request->currency == 'USD') {
            $rate = 1;
        }
        return $rate;
    }

    public function checkChangedWatchAdvert(Advert $advert, WatchAdvertRequest $request)
    {

        $this->advert = $advert;
        $this->request = $request;

//        dd($this->advert->price, $this->setPrice(), round($this->advert->price, 5) == round($this->setPrice(), 5));
//        dd($this->advert->price_rate, $this->setPriceRate(), $this->advert->price_rate === $this->setPriceRate(), round($this->advert->price_rate, 5) == round($this->setPriceRate(), 5));
        if(
        $this->advert->title == $this->createAdvertName() &&
        $this->advert->description == $this->request->description &&
        round($this->advert->price_rate, 5) == round($this->setPriceRate(), 5) &&
        round($this->advert->price, 5) == round($this->setPrice(), 5) &&
        $this->advert->currency_id == Currency::where('title', $this->request->currency)->first()->id &&
        $this->advert->surname == $this->request->surname &&
        $this->advert->name == $this->request->name &&
        $this->advert->birthday == $this->request->birthday &&
        $this->advert->phone == $this->request->phone &&
        $this->advert->country == $this->request->country &&
        $this->advert->country == $this->request->country &&
        $this->advert->city == $this->request->city &&
        $this->advert->region == $this->request->region &&
        $this->advert->street == $this->request->street &&
        $this->advert->zip_code == $this->request->zip_code &&
        $this->advert->street_additional == $this->request->street_additional &&
        $this->advert->delivery_volume == $this->request->deliveryVolume &&
        $this->advert->latitude == $this->request->lat &&
        $this->advert->longtitude == $this->request->lng &&
        $this->advert->is_publish_surname != $this->request->is_publish_surname
        ) {
            return false;
        } else {
            return true;
        }
    }

    public function createAdvertName()
    {
        $this->setParametersMakeAndModel();

        if($this->advert->type == 'watch'){
            return $this->watchMake->title.' '.$this->watchModel->title.' '.$this->watchModel->model_code;
        }
    }

    public function setParametersMakeAndModel()
    {
        if(isset($this->advert->watchAdvert->watchMake, $this->advert->watchAdvert->watchModel)){
            $this->watchMake = $this->advert->watchAdvert->watchMake;
            $this->watchModel = $this->advert->watchAdvert->watchModel;
        }
    }
}
