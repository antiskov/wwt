<?php

namespace App\Services;

use App\Models\Advert;
use File;
use Illuminate\Support\Facades\Storage;

class WatchModelService
{
    protected $watchModel;

    /**
     * @param Advert $advert
     */
    private function setWatchModelPhoto(Advert $advert)
    {
        $photo = $advert->photos()->where('is_basic', 1)->first();
        $pathAdvertPhoto = 'public/images/notice_photos/' . $advert->type . '/number_' . $advert->id . '/' . $photo->photo;
        $pathModelPhoto = 'public/images/models/watches/model_' . $this->watchModel->model_code . '/' . $photo->photo;

        if(!Storage::disk('local')->exists($pathAdvertPhoto)){
            Storage::copy($pathAdvertPhoto, $pathModelPhoto);
            $this->watchModel->photo = $photo;
            $this->watchModel->save();
        }

    }

    /**
     * @param Advert $advert
     */
    public function updateWatchModel(Advert $advert)
    {
        $watchAdvert = $advert->watchAdvert;
        $this->watchModel = $watchAdvert->watchModel;
        $this->watchModel->watch_type_id = $watchAdvert->watch_type_id;
        $this->watchModel->watch_make_id = $watchAdvert->watch_make_id;
        $this->watchModel->model_code = $watchAdvert->model_code;
        $this->watchModel->sex_id = $watchAdvert->sex_id;
        $this->watchModel->height = $watchAdvert->height;
        $this->watchModel->width = $watchAdvert->width;
        $this->watchModel->mechanism_type_id = $watchAdvert->mechanism_type_id;
        $this->watchModel->is_moderated = 1;
        $this->watchModel->save();

        $this->setWatchModelPhoto($advert);
    }
}
