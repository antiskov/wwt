<?php

namespace App\Exceptions;

use Exception;

class EmailCodeValidException extends Exception
{
    /**
     *
     */
    public function report() {
        \Log::debug('Valid code dont send.');
    }
}
