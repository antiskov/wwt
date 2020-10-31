<?php


namespace App\Exceptions;

use Exception;

class UnknownAdvertTypeException extends Exception
{
    public function report()
    {
        \Log::debug('Wrong advert type');
    }
}
