<?php

namespace App\Domain;

use App\Contracts\AdvertsFilters;
use Illuminate\Http\Request;

class AdvertsFiltersDirector
{
    protected $result;

    public function setQueryToDB(Request $request, AdvertsFilters $advertsFilters)
    {
        $advertsFilters->index($request, $user_id = 0, $nameView = 'user_adverts_view');
        $this->result = $advertsFilters->getResult();
    }

    public function getResult()
    {
        return $this->result;
    }


}
