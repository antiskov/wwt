<?php

namespace App\Http\Controllers;

use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Domain\Submitting\Init\WatchConnector;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Services\SubmittingService;

class SubmittingController extends Controller
{
    public function index(SubmittingRequest $request, SubmittingService $service)
    {
        $request->merge(['start_model_code' => rand(10000,20000)]);

        return view('submitting.pages.advert', $service->getInfoForStep1(new WatchConnector($request)));
    }

    public function createDraft(Advert $advert, WatchAdvertRequest $request, SubmittingService $service)
    {
        $advert = $service->createDraft(new AdvertWatchConnector($request, $advert));

        return redirect()->route('submitting.get_draft', $advert);
    }

    public function getDraft(Advert $advert)
    {
        dd($advert->id);
    }
}
