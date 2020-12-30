<?php

namespace App\Services;

use App\Domain\Uploader;
use App\Models\ManWomanPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManWomanPicturesService
{
    public function createManWomanPictures(Request $request)
    {
        $uploader = new Uploader();

        $uploader->uploadImage($request, 'man_image', 'admin/man_woman_pictures');
        $man_image = $uploader->getFilename();

        $uploader->uploadImage($request, 'woman_image', 'admin/man_woman_pictures');
        $woman_image = $uploader->getFilename();

        if ($picture = ManWomanPicture::latest()->first()) {
            $picture->delete();
            Storage::delete('/public/admin/man_woman_pictures/' . $picture->man);
            Storage::delete('/public/admin/man_woman_pictures/' . $picture->woman);
        }

        $picture = new ManWomanPicture();
        $picture->man = $man_image;
        $picture->woman = $woman_image;

        if (!$picture->save()) {
            Log::info("ManWomanPicture #$picture->id not saved");
        }
    }
}
