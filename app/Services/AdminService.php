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
use App\Models\Status;
use App\Models\WatchMake;
use App\Models\WatchModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminService
{
    //todo: to Banner servicse
    //todo: banner deactivation to console script

    public function createBanner(Request $request)
    {

        $bannerOld = Banner::where('is_active', 1)->first();
        //todo: remove check by time
        if($bannerOld && (date('Y-m-d') > $bannerOld->date_finish))  {
            $bannerOld->is_active = 0;
        }
        //todo: to uploader
        $filename = $request->file('banner_image')->getClientOriginalName();
        $request->file('banner_image')->storeAs('banners', $filename, 'public');
        //todo: проверка есть ли накладка по времени между datestart новго баннера и date_finish активного старого
        $banner = new Banner();
        $banner->description = $request->description;
        $banner->date_start = $request->date_start;
        $banner->date_finish = $request->date_finish;
        $banner->banner_image = $filename;
        $banner->is_active = 1;
        $banner->link = $request->link;
        //todo: check is success. Error message to log
        $banner->save();
    }
    //todo: updateBanner($id,array $data). Get and save in one place
    public function closeBanner(Banner $banner)
    {
        $banner->is_active = 0;
        $banner->save();
    }
    //todo: don't needed
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
        //todo: check is success. Error message to log
        $picture->save();
    }

    public function publishedWatchMake(Advert $advert)
    {
        $watchMake = $advert->watchAdvert->watchMake;
        $watchMake->is_moderated = 1;

        if (!$watchMake->save()) {
            Log::info("WatchMake #$watchMake->id not saved");
            return false;
        }
    }

    public function getCreatorId(Filter $advert)
    {
        return $advert->getUserId();
    }

    public function create(WatchEntity $watchEntity, AdvertCreator $creator)
    {

    }
//    public function getCreator(string $type): AdvertCreator
//    {
//        switch ($type) {
//            case 'watch':
//                $creator= new WatchesAdvertCreator();
//                break;
//            default:
//                throw new UnknownAdvertTypeException;
//        }
//        return $creator;
//    }



    public function changeStatus(Status $status, Advert $advert)
    {
        $advert->status_id = $status->id;
        $advert->save();

        if($status->title == 'published'){
            $advert->finish_date = Carbon::now()->addMonth(3);
            $advert->save();
        }
    }

    public function deleteAdvert(Advert $advert)
    {
        $advert->delete();
    }

    public function uploadSlider(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('admin/sliders', $image, 'public');
        //todo: To externall method CreateSlider
        $slider = new HomeSlider();
        $slider->image = $image;
        $slider->upper_text = $request->upper_text;
        $slider->middle_text = $request->middle_text;
        $slider->link = $request->link;
        $slider->is_active = 1;
        //todo: check is success. Error message to log
        $slider->save();
    }

    public function createMaker(Request $request)
    {   //todo: to FormRequest Validator
        if(!WatchMake::where('title', $request->title)->where('logo', $request->logo)->first()){
            //todo: To externall method UploadMakerImage
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('admin/makers', $logo, 'public');

            $maker = new WatchMake();
            $maker->title = $request->title;
            $maker->logo = $logo;
            $maker->status = 0;
            //todo: check is success. Error message to log
            $maker->save();
        }
    }
}
