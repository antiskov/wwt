<?php

namespace App\Services;

use App\Domain\Submitting\AbstractSubmitting;
use App\Domain\Submitting\SubmittingWatch;
use App\Http\Requests\SubmittingRequest;

class SubmittingService
{
    public function getInfoForStep1(AbstractSubmitting $submitting)
    {
        return $submitting->get();
    }
}
