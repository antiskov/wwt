<?php

namespace App\Domain\Submitting\Init;

use App\Contracts\Submitting\SubmittingInterface;

abstract class AbstractSubmitting
{
    public $request;

    abstract public function getSubmit():SubmittingInterface;

    public function get():array
    {
        $advert = $this->getSubmit();
        $advert->init();

        return $advert->getInfo();
    }
}
