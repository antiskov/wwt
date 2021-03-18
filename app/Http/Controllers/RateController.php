<?php

namespace App\Http\Controllers;

use App\Services\RateService;
use GuzzleHttp\Exception\GuzzleException;

class RateController
{
    /**
     * @param RateService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws GuzzleException
     */
    public function update(RateService $service): \Illuminate\Http\RedirectResponse
    {
        $service->update();

        return redirect()->back();
    }
}
