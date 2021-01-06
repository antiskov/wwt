<?php


namespace App\Contracts;

use Illuminate\Http\Request;

interface Filter
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request);

    /**
     * @return mixed
     */
    public function getQuery();

    /**
     * @return mixed
     */
    public function getBindsArr();
}
