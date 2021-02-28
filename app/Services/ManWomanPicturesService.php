<?php

namespace App\Services;

use App\Domain\Uploader;
use App\Models\ManWomanPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManWomanPicturesService
{
    /**
     * @param Request $request
     */
    public function createManWomanPictures(Request $request)
    {
        $uploader = new Uploader();
        $picture = ManWomanPicture::latest()->first();
        if(!$picture){
            $picture = new ManWomanPicture();
        }
        if ($request->man_image){
            $uploader->uploadImage($request, 'man_image', 'admin/man_woman_pictures');  
            $picture->man = $uploader->getFilename();
        }

        if ($request->woman_image){
            $uploader->uploadImage($request, 'woman_image', 'admin/man_woman_pictures');
            $picture->woman = $uploader->getFilename();
        }

        if (!$picture->save()) {
            Log::info("ManWomanPicture #$picture->id not saved");
        }
    }
}
