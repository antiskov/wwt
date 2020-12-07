<?php

namespace App\Domain\AdvertsAndFilters;

use App\Contracts\AdvertsFilters;
use App\Domain\FilterDirector;
use App\Domain\Filters\MainPageFilter;
use App\Domain\ToolsForAdvertsFilters;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VipAdvertsAndFiltersGetter extends ToolsForAdvertsFilters implements AdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $query = DB::table($nameView)->where('vip_status', 1);

        $adverts = $this->paginateCustom(
            $this->getQuery($query, $request)
                ->orderBy('vip_status', 'desc')
                ->orderBy('price', $this->getOrderBy($request)),
            $request->fullUrl(),
            $this->getCountPagination()
        );

        $this->setSearchLink($request);

        $itemsArr = [
            'adverts' => $adverts,
            'countResults' => $query->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' =>  $this->setStateNew($request),
        ];

        $this->result = array_merge($itemsArr, $this->getNameAndCountFilters($user_id, ' and vip_status in (1)'));

    }

    public function getResult()
    {
        return $this->result;
    }

    public function getFilterCountResults(Request $request)
    {
        $nameView = 'user_adverts_view';
        $countQuery = $this->getQuery(DB::table($nameView)->where('vip_status', 1), $request);

        $this->result = ['countResults' => $countQuery->get()->count()];
    }
}
