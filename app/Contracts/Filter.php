<?php


namespace App\Contracts;

use Illuminate\Http\Request;

interface Filter
{
    public function make(Request $request);

    public function getQuery();
}
