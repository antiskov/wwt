<?php

namespace App\Services;

use App\Domain\Uploader;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerService
{
    public function createBanner(Request $request)
    {
//        //todo: remove check by time. done
        //todo: to uploader. done

        $service = new Uploader();
        $service->uploadImage($request, 'banner_image', 'banners');


        //todo: проверка есть ли накладка по времени между datestart новго баннера и date_finish активного старого. done

        $bannerCheck = Banner::where('date_finish', $request->date_start)->first();

        if (!$bannerCheck){
            $banner = new Banner();
            $banner->description = $request->description;
            $banner->date_start = $request->date_start;
            $banner->date_finish = $request->date_finish;
            $banner->banner_image = $service->getFilename();
            $banner->is_active = 1;
            $banner->link = $request->link;
            //todo: check is success. Error message to log. done

            if (!$banner->save()) {
                Log::info("Banner #$banner->id not checked");
            }
        }
    }

    public function checkActive()
    {
        $bannerOld = Banner::where('is_active', 1)->first();
        if($bannerOld && (date('Y-m-d') > $bannerOld->date_finish))  {
            $bannerOld->is_active = 0;

            if (!$bannerOld->save()) {
                Log::info("Banner #$bannerOld->id not checked");
            }
        }
    }
}
