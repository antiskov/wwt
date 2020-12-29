<?php

namespace App\Http\Controllers;

use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Domain\TransactionCreator;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\UploadImageRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Status;
use App\Services\PayService;
use App\Services\SubmittingService;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;

class SubmittingController extends Controller
{
    public function index(SubmittingRequest $request, SubmittingService $service)
    {
        return view('submitting.pages.advert', $service->getWatchItemsForFirstStep());
    }

    public function createDraft(WatchAdvertRequest $request, SubmittingService $service)
    {
        $advert = $service->createDraft($request);

        return redirect()->route('submitting.get_draft', $advert);
    }

    public function editDraft(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
    {
        if($service->checkChangedAdvertWatch($advert, $request)) {
            $advert = $service->editDraft(new AdvertWatchConnector($request, $advert));

            $advert->status_id = Status::where('title', 'draft')->first()->id;
            $advert->save();
        }

        return redirect()->route('submitting.get_draft', $advert);
    }

    public function getDraft(Advert $advert, SubmittingService $service)
    {
        return view('submitting.pages.advert', $service->getDraftWatchItemsForFirstStep($advert));
    }

    public function uploadImage(Advert $advert, UploadImageRequest $request, SubmittingService $service)
    {
        $service->uploadPhoto($advert->id, $advert->type, $request);

        $data = [
            'output' => view('submitting.partials.image_block', ['advert' => $advert])->toHtml(),
        ];

        return response()->json($data);
    }

    public function deletePhoto(AdvertPhoto $photo)
    {
        $photo->delete();

        return response('success');
    }

    public function buyVip(PayService $service, Advert $advert)
    {
        if ($service->getScore() >= 50){
            $service->bayVipStatusFromCost($advert);

            return redirect()->back();
        }
        return redirect()->route('go_to_liqpay', $service->setTransactionForSubmitting($advert));
    }

    public function publish(Advert $advert)
    {

        $advert->status_id = Status::where('title', 'moderation')->first()->id;
        $advert->save();

//        dd(Status::where('title', 'moderation')->first()->id, $advert);

        $user = $advert->user;
        $role = (new UserService())->getRole($user);

        if ($role->title == 'admin' || $role->title == 'manager'){
            return redirect()->route('admin.moderation_adverts');
        }

        return redirect()->route('my_adverts');
    }

    public function getStep4(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
    {
        $advert = $service->editDraft(new AdvertWatchConnector($request, $advert));

        $data = [
            'output' => view('submitting.partials.step4', [
                'advert' => $advert,
                'price' => $service->getPrice($advert)
            ])->toHtml(),
        ];

        return response()->json($data);
    }

//    public function getStep2(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
//    {
//        $advert = $service->editDraft(new AdvertWatchConnector($request, $advert));
//
//        $data = [
//            'output' => view('submitting.partials.step2', [
//                'advert' => $advert,
//            ])->toHtml(),
//        ];
//
//        return response()->json($data);
//    }
}
