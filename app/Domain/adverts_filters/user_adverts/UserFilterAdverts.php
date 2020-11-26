<?php

namespace App\Domain\adverts_filters;

use App\Contracts\AdvertsFilters;
use App\Contracts\Filter;
use App\Domain\ToolsForAdvertsFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFilterAdverts extends AdvertFilterGetter
{
    protected $result;

//    public function getResultForUser(Request $request, $user_id)
//    {
//        $this->index($request, $user_id);
//    }
//
//    public function getDataForUser()
//    {
//        return $this->getResult();
//    }
}
