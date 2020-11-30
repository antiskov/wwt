<?php


namespace App\Contracts;

use Illuminate\Http\Request;

interface AdvertsFilters
{
    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view');

    public function getResult();
}
