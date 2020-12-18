<?php

namespace App\Http\Controllers;

use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\UploadImageRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\Status;
use App\Services\PayService;
use App\Services\SubmittingService;
use Illuminate\Support\Facades\Storage;

class SubmittingController extends Controller
{
//    public function __construct()
//    {
//        if(auth()->user()->cannot('view', $advert))
//    }

    public function index(SubmittingRequest $request, SubmittingService $service)
    {
        $request->merge(['start_model_code' => rand(10000,20000)]);

//        return view('submitting.pages.advert', $service->getInfoForStep1(new WatchConnector($request)));

        return view('submitting.pages.advert', $service->getItemsForFirstStep($request));
    }

    public function editDraft(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
    {
//        dd($request->phone);
        $advert = $service->createDraft(new AdvertWatchConnector($request, $advert));

        return redirect()->route('submitting.get_draft', $advert);
    }

    public function getDraft(Advert $advert, SubmittingService $service)
    {
        return view('submitting.pages.advert', $service->getDraftItemsForFirstStep($advert));
    }

    public function uploadImage(Advert $advert, UploadImageRequest $request, SubmittingService $service)
    {
        $service->uploadPhoto($advert, $request);

        $data = [
            'output' => view('submitting.partials.image_block', ['advert' => $advert])->toHtml(),
        ];

        return response()->json($data);
    }

    public function deletePhoto(AdvertPhoto $photo, SubmittingService $service)
    {
        $service->deleteAdvertPhoto($photo);
        return response('success');
    }

    public function buyVip(PayService $service, Advert $advert)
    {
        return redirect()->route('go_to_liqpay', $service->setTransactionForSubmitting($advert));
    }

    public function publish(Advert $advert)
    {
        $advert->status_id = Status::where('title', 'moderation')->first()->id;
        $advert->save();
        return redirect()->route('home');
    }

    public function getStep4(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
    {
        $advert = $service->createDraft(new AdvertWatchConnector($request, $advert));

        $data = [
            'output' => view('submitting.partials.step4', ['advert' => $advert])->toHtml(),
        ];

        return response()->json($data);
    }
}
