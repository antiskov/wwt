<?php

namespace App\Http\Controllers;

use App\Services\RateService;

class RateController
{
    /**
     * @param RateService $service
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(RateService $service)
    {
        return $service->update();
    }
}
