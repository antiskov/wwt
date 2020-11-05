<?php


namespace App\Services;


use App\Contracts\AdvertsInterface;
use App\Models\Advert;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerService
{
    public function createBanner(Request $request)
    {
        $bannerOld = Banner::where('is_active', 1)->first();
        if($bannerOld && (date('Y-m-d') > $bannerOld->date_finish))  {
            $bannerOld->is_active = 0;
        }

        $filename = $request->file('banner_image')->getClientOriginalName();
        $request->file('banner_image')->storeAs('banners', $filename, 'public');

        $banner = new Banner();
        $banner->description = $request->description;
        $banner->date_start = $request->date_start;
        $banner->date_finish = $request->date_finish;
        $banner->banner_image = $filename;
        $banner->is_active = 1;
        $banner->save();
    }

    public function closeBanner(Banner $banner)
    {
        $banner->is_active = 0;
        $banner->save();
    }
}
