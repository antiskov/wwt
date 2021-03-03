<?php


namespace App\Contracts;

use Illuminate\Http\Request;

interface AdvertsFilters
{
    /**
     * @param Request $request
     * @param int $user_id
     * @param string $nameView
     * @return mixed
     */
    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view');

    /**
     * @return mixed
     */
    public function getResult();
}
