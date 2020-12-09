<?php


namespace App\Services;


use App\Contracts\AdvertCreator;
use App\Contracts\Filter;
use App\DataObjects\WatchEntity;
use App\Domain\WatchesAdvertCreator;
use App\Exceptions\UnknownAdvertTypeException;
use App\Models\Advert;
use App\Models\Banner;
use App\Models\HomeSlider;
use App\Models\ManWomanPicture;
use App\Models\WatchMake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminService
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
        $banner->link = $request->link;
        $banner->save();
    }

    public function closeBanner(Banner $banner)
    {
        $banner->is_active = 0;
        $banner->save();
    }

    public function deleteBanner(Banner $banner)
    {
        $banner->delete();
    }

    public function createManWomanPictures(Request $request)
    {
        $man_image = 'man_'.$request->file('man_image')->getClientOriginalName();
        $woman_image = 'woman_'.$request->file('woman_image')->getClientOriginalName();
        $request->file('man_image')->storeAs('admin/man_woman_pictures', $man_image, 'public');
        $request->file('woman_image')->storeAs('admin/man_woman_pictures', $woman_image, 'public');

        if($picture = ManWomanPicture::latest()->first()) {
            $picture->delete();
            Storage::delete('/public/admin/man_woman_pictures/'.$picture->man);
            Storage::delete('/public/admin/man_woman_pictures/'.$picture->woman);
        }

        $picture = new ManWomanPicture();
//        dd($man_image);
        $picture->man = $man_image;
        $picture->woman = $woman_image;
        $picture->save();
    }

    public function getCreatorId(Filter $advert)
    {
        return $advert->getUserId();
    }

    public function create(WatchEntity $watchEntity, AdvertCreator $creator)
    {

    }
    public function getCreator(string $type): AdvertCreator
    {
        switch ($type) {
            case 'watch':
                $creator= new WatchesAdvertCreator();
                break;
            default:
                throw new UnknownAdvertTypeException;
        }
        return $creator;
    }

    public function changeStatus($status, Advert $advert)
    {
        $advert->status_id = $status;
        $advert->save();
    }

    public function deleteAdvert(Advert $advert)
    {
        $advert->delete();
    }

    public function uploadSlider(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('admin/sliders', $image, 'public');

        $slider = new HomeSlider();
        $slider->image = $image;
        $slider->upper_text = $request->upper_text;
        $slider->middle_text = $request->middle_text;
        $slider->link = $request->link;
        $slider->is_active = 1;
        $slider->save();
    }

    public function createMaker(Request $request)
    {
        if(!WatchMake::where('title', $request->title)->where('logo', $request->logo)->first()){
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('admin/makers', $logo, 'public');

            $maker = new WatchMake();
            $maker->title = $request->title;
            $maker->logo = $logo;
            $maker->status = 0;
            $maker->save();
        }
    }
}
