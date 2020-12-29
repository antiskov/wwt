<?php


namespace App\Services;


use App\Contracts\AdvertCreator;
use App\Contracts\Filter;
use App\DataObjects\WatchEntity;
use App\Domain\Uploader;
use App\Domain\WatchesAdvertCreator;
use App\Exceptions\UnknownAdvertTypeException;
use App\Http\Requests\MakerRequest;
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
    //todo: to Banner servicse.done
    //todo: banner deactivation to console script.done

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
        //todo: check is success. Error message to log. done
        if (!$picture->save()) {
            Log::info("ManWomanPicture #$picture->id not saved");
        }
    }

    public function publishedWatchMake(Advert $advert)
    {
        $watchMake = $advert->watchAdvert->watchMake;
        $watchMake->is_moderated = 1;

        if (!$watchMake->save()) {
            Log::info("WatchMake #$watchMake->id not saved");
        }
    }

    public function getCreator(string $type): AdvertCreator
    {
        switch ($type) {
            case 'watch':
                $creator = new WatchesAdvertCreator();
                break;
            default:
                throw new UnknownAdvertTypeException;
        }
        return $creator;
    }


    public function changeStatus(Status $status, Advert $advert)
    {
        $advert->status_id = $status->id;
        if (!$advert->save()) {
            Log::info("Advert #$advert->id not saved");
        }

        if ($status->title == 'published') {
            $advert->finish_date_active_status = Carbon::now()->addMonth(2);

            if ($advert->vip_status == 1 && !$advert->finish_date_vip){
                $advert->finish_date_vip = Carbon::now()->addMonth(1);
            }

            if (!$advert->save()) {
                Log::info("Advert #$advert->id not saved");
            }
        }
    }

    public function uploadSlider(Request $request)
    {
        $service = new Uploader();
        $service->uploadImage($request, 'image', 'admin/sliders');

        $this->createSlider($request, $service->getFilename());
    }

    public function createSlider(Request $request, $image)
    {
        //todo: To externall method CreateSlider.done
        $slider = new HomeSlider();
        $slider->image = $image;
        $slider->upper_text = $request->upper_text;
        $slider->middle_text = $request->middle_text;
        $slider->link = $request->link;
        $slider->is_active = 1;
        //todo: check is success. Error message to log.done
        if (!$slider->save()) {
            Log::info("Slider #$slider->id not checked");
        }
    }

    public function createMaker(MakerRequest $request)
    {   //todo: to FormRequest Validator.done
        //todo: To externall method UploadMakerImage.done

        $service = new Uploader();
        $service->uploadImageForFormRequest($request, 'logo', 'admin/makers');

        $maker = new WatchMake();
        $maker->title = $request->title;
        $maker->logo = $service->getFilename();
        $maker->status = 0;
        $maker->is_moderated = 1;
        //todo: check is success. Error message to log.done
        if (!$maker->save()) {
            Log::info("Maker #$maker->id not checked");
        }
    }
}
