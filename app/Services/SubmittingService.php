<?php

namespace App\Services;

use App\Domain\Submitting\Advert\AdvertAbstract;
use App\Domain\Submitting\Advert\AdvertTools;
use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Domain\Submitting\Init\AbstractSubmitting;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\UploadImageRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Currency;
use App\Models\MechanismType;
use App\Models\Sex;
use App\Models\Status;
use App\Models\WatchAdvert;
use App\Models\WatchType;
use Illuminate\Support\Facades\Storage;

class SubmittingService
{
    public function getInfoForStep1(AbstractSubmitting $submitting): array
    {
        return $submitting->get();
    }

    public function editDraft(AdvertAbstract $submitting): Advert
    {
        return $submitting->get();
    }

    public function createDraft(WatchAdvertRequest $request)
    {
        $advert = $this->createAdvert();
        $this->editDraft(new AdvertWatchConnector($request, $advert));

        return $advert;
    }
    //todo: refactor
    public function uploadPhoto(Advert $advert, UploadImageRequest $request)
    {
        foreach ($request->file('advert_images') as $image) {
            $name = $image->getClientOriginalName();
            if (!AdvertPhoto::where('photo', $name)->where('advert_id', $advert->id)->first()) {


                $path = '/images/advert_photos/' . $advert->type . '/number_' . $advert->id;
                $image->storeAs($path, $name, 'public');
                //todo: method
                $imageAdvert = new AdvertPhoto();
                $imageAdvert->advert_id = $advert->id;
                $imageAdvert->photo = $name;
                $imageAdvert->save();
            }
        }
    }

//    public function getWatchItemsForFirstStep(SubmittingRequest $request)
    public function getWatchItemsForFirstStep()
    {
//        $advert = $this->createAdvert();
//        $this->createWatchAdvert($request, $advert);
//        $infoArr = $this->getInfoArr($request, $advert);
        $infoArr = $this->getPartInfoArr();
        $infoArr['position'] = 0;

        return $infoArr;
    }

    public function getDraftWatchItemsForFirstStep(Advert $advert)
    {
        $infoArr = $this->getDraftInfoArr($advert);
        $infoArr['position'] = 1;
        $infoArr['price'] = $this->getPrice($advert);
        return $infoArr;
    }

    public function createWatchAdvert(SubmittingRequest $request, Advert $advert)
    {
        if ($model_code = $request->input('start_model_code', false)) {
            $watch_advert = new WatchAdvert();
            $watch_advert->advert()->associate($advert);
            $watch_advert->model_code = $model_code;
            $watch_advert->save();
        }
    }

    protected function createAdvert(): Advert
    {
        $advert = new Advert();
        $advert->user()->associate(auth()->user());
        $advert->title = 'none';
        $advert->currency_id = 1;
        $advert->vip_status = 0;
        $advert->status_id = Status::where('title', 'draft')->first()->id;
        $advert->price_rate = 1;
        $advert->save();

        return $advert;
    }

    private function getInfoArr(SubmittingRequest $request, Advert $advert)
    {
        $infoArr = $this->getPartInfoArr($advert);
        if ($request->start_model_code) {
            $infoArr['model_code'] = $request->start_model_code;
        }

        return $infoArr;
    }

    private function getDraftInfoArr(Advert $advert)
    {
        $infoArr = $this->getPartInfoArr();
        $infoArr['advert'] = $advert;
        if ($advert) {
            $infoArr['model_code'] = $advert->watchAdvert->model_code;
        }

        return $infoArr;

    }

//    private function getPartInfoArr(Advert $advert)
    private function getPartInfoArr()
    {
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = ['with box', 'with original documents', 'with original documents and box'];
        $infoArr['states'] = ['new', 'used'];
        $infoArr['sexes'] = Sex::all();
        $infoArr['mechanismTypes'] = MechanismType::all();
        $infoArr['currencies'] = Currency::all();

//        if ($advert) {
//            $infoArr['advert'] = $advert;
//        }

        return $infoArr;
    }

    public function deleteAdvertPhoto(AdvertPhoto $photo)
    {
        if ($photo) {
            //todo: уточнить у Жени надо ли удалять исходник
            Storage::delete('/public/images/advert_photos/watch/number_' . $photo->advert->id . '/' . $photo->photo);
            $photo->delete();
        }
    }

    public function getPrice(Advert $advert)
    {
        return round($advert->price * $advert->price_rate);
    }
}
