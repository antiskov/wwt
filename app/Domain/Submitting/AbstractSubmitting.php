<?php

namespace App\Domain\Submitting;

use App\Contracts\SubmittingInterface;
use App\Http\Requests\SubmittingRequest;
use App\Models\Advert;

abstract class AbstractSubmitting
{
    public $request;

    abstract public function getSubmit():SubmittingInterface;

    public function get()
    {
        $advert = $this->getSubmit();
        $advert->init();

        return $advert->getInfo();
    }
}
