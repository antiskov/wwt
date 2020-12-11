<?php

namespace App\Http\Controllers;

use App\Domain\Submitting\WatchConnector;
use App\Http\Requests\SubmittingRequest;
use App\Services\SubmittingService;

class SubmittingController extends Controller
{
    public function index(SubmittingRequest $request, SubmittingService $service)
    {
        $request->merge(['model_code' => rand(10000,20000)]);

        return view('pages.submitting', $service->getInfoForStep1(new WatchConnector($request)));
    }
}
