<?php

namespace App\Domain\AdvertsAndFilters;

use App\Contracts\AdvertsFilters;
use App\Domain\ToolsForAdvertsFilters;
use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AdvertsFiltersGetter extends ToolsForAdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $query = DB::table($nameView);

        $adverts = $this->getAdverts($query, $request);

        $this->setSearchLink($request);

        $itemsArr = [
            'adverts' => $adverts,
            'countResults' => $query->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' =>  $this->setStateNew($request),
        ];

        $this->result = array_merge($itemsArr, $this->getNameAndCountFilters());

    }

    public function getResult()
    {
        return $this->result;
    }

    public function getFilterCountResults(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $nameView = 'user_adverts_view';
        $countQuery = $this->getQuery(DB::table($nameView), $request);

        $this->result = ['countResults' => $countQuery->get()->count()];
    }
}
