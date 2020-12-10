<?php

namespace App\Services;

use App\Domain\Submitting\SubmittingWatch;
use App\Http\Requests\SubmittingRequest;

class SubmittingService
{
    public function getInfoForStep1(SubmittingRequest $request)
    {
        $submitting = new SubmittingWatch($request);
        return $submitting->getInfoForStep();
    }
}
