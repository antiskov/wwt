<?php

namespace App\Domain\Submitting;

use App\Contracts\SubmittingInterface;
use App\Http\Requests\SubmittingRequest;

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
