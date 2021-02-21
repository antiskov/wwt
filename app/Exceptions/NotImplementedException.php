<?php

namespace App\Exceptions;

use Exception;

class NotImplementedException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Method not implemented');
    }
}
