<?php

namespace App\Domain\Submitting\Init;

use App\Contracts\Submitting\SubmittingInterface;
use App\Http\Requests\Submitting\SubmittingRequest;

class WatchConnector extends AbstractSubmitting
{
    public $request;

    public function __construct(SubmittingRequest $request)
    {
        $this->request = $request;
    }

    public function getSubmit():SubmittingInterface
    {
        return new SubmittingWatch($this->request);
    }
}
