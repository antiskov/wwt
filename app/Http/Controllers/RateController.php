<?php

namespace App\Http\Controllers;

use App\Services\RateService;

class RateController
{
    public function update(RateService $service)
    {
        return $service->update();
    }
}
