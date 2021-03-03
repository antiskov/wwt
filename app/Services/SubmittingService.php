<?php

namespace App\Services;

use App\Domain\Submitting\Advert\AdvertAbstract;
use App\Domain\Submitting\Advert\AdvertTools;
use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Domain\Submitting\Init\AbstractSubmitting;
use App\Domain\Uploader;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\UploadImageRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Currency;
use App\Models\DeliveryVolume;
use App\Models\MechanismType;
use App\Models\Sex;
use App\Models\Status;
use App\Models\WatchAdvert;
use App\Models\WatchMake;
use App\Models\WatchType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SubmittingService
{
    /**
     * @param AdvertAbstract $submitting
     * @return Advert
     */
    public function editDraft(AdvertAbstract $submitting): Advert
    {
        return $submitting->get();
    }

    /**
     * @param WatchAdvertRequest $request
     * @return Advert
     */
    public function createDraft(WatchAdvertRequest $request)
    {
        $advert = $this->createAdvert($request);
        $this->editDraft(new AdvertWatchConnector($request, $advert));

        return $advert;
    }

    /**
     * @param $advertID
     * @param $advertType
     * @param UploadImageRequest $request
     */
    public function uploadPhoto($advertID, $advertType, UploadImageRequest $request)
    {
        foreach ($request->file('advert_images') as $image) {
            $name = $image->getClientOriginalName();
            if (!AdvertPhoto::where('photo', $name)->where('advert_id', $advertID)->first()) {
                $path = 'images/advert_photos/' . $advertType . '/number_' . $advertID;
                $path = 'images/notice_photos/' . $advertType . '/number_' . $advertID;
                $image->storeAs($path, $name, 'public');

                $this->createAdvertPhoto($advertID, $name);

                $minifyPath = 'public/'.$path;

                (new ImageMinificationService())->minify($name, ['small'], $minifyPath);
            }
        }
    }

    /**
     * @param $advertID
     * @param $name
     */
    public function createAdvertPhoto($advertID, $name)
    {
        $imageAdvert = new AdvertPhoto();
        $imageAdvert->advert_id = $advertID;
        $imageAdvert->photo = $name;
        if (!$imageAdvert->save()) {
            Log::info("AdvertPhoto #$imageAdvert->id not saved");
        }
    }

    /**
     * @return array
     */
    public function getWatchItemsForFirstStep()
    {
        $infoArr = $this->getPartInfoArr();
        $infoArr['position'] = 0;

        return $infoArr;
    }

    /**
     * @param Advert $advert
     * @return array
     */
    public function getDraftWatchItemsForFirstStep(Advert $advert)
    {
        $infoArr = $this->getDraftInfoArr($advert);
        $infoArr['position'] = 1;
        $infoArr['price'] = $this->getPrice($advert);
        return $infoArr;
    }

    /**
     * @param SubmittingRequest $request
     * @param Advert $advert
     */
    public function createWatchAdvert(SubmittingRequest $request, Advert $advert)
    {
        if ($model_code = $request->input('start_model_code', false)) {
            $watch_advert = new WatchAdvert();
            $watch_advert->advert()->associate($advert);
            $watch_advert->model_code = $model_code;
            if (!$watch_advert->save()) {
                Log::info("WatchAdvert #$watch_advert->id not saved");
            }
        }
    }

    /**
     * @return Advert
     */
    protected function createAdvert(WatchAdvertRequest $request): Advert
    {
        $advert = new Advert();
        $advert->user()->associate(auth()->user());
        $advert->title = 'none';
        $advert->currency_id = 1;
        $advert->vip_status = 0;
        $advert->status_id = Status::where('title', 'draft')->first()->id;
        $advert->price_rate = 1;
        $advert->delivery_volume_id = DeliveryVolume::where('title', $request->deliveryVolume)->first()->id;
        if (!$advert->save()) {
            Log::info("Advert #$advert->id not saved");
        }

        return $advert;
    }

    /**
     * @param Advert $advert
     * @return array
     */
    private function getDraftInfoArr(Advert $advert)
    {
        $infoArr = $this->getPartInfoArr();
        $infoArr['advert'] = $advert;
        if ($advert) {
            $infoArr['model_code'] = $advert->watchAdvert->model_code;
        }

        return $infoArr;

    }

    /**
     * @return array
     */
    private function getPartInfoArr()
    {
        $infoArr['watchTypes'] = WatchType::where('is_active', 1)->get();
        $infoArr['deliveryVolumes'] = DeliveryVolume::where('is_active', 1)->get();
        $infoArr['states'] = ['new', 'used'];
        $infoArr['sexes'] = Sex::all();
        $infoArr['mechanismTypes'] = MechanismType::where('is_active', 1)->get();
        $infoArr['currencies'] = Currency::all();
        $infoArr['brands'] = WatchMake::where('is_moderated', 1)->get();

        return $infoArr;
    }

    /**
     * @param Advert $advert
     * @return float
     */
    public function getPrice(Advert $advert)
    {
        return round($advert->price * $advert->price_rate);
    }

    /**
     * @param Advert $advert
     * @param WatchAdvertRequest $request
     * @return bool
     */
    public function checkChangedAdvertWatch(Advert $advert, WatchAdvertRequest $request)
    {
        return (new AdvertTools())->checkChangedWatchAdvert($advert, $request);
    }

    public function setModerationStatus($id)
    {
        $advert = Advert::find($id);
        $advert->status_id = 1;
        $advert->save();
    }
}
