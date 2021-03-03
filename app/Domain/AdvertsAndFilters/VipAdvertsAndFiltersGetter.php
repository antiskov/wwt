<?php

namespace App\Domain\AdvertsAndFilters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VipAdvertsAndFiltersGetter extends ToolsForAdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $query = DB::table($nameView)->where('vip_status', 1);

        $adverts = $this->getAdverts($query, $request);

        $this->setSearchLink($request);

        $itemsArr = [
            'adverts' => $adverts,
            'countResults' => $query->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' =>  $this->setStateNew($request),
            'vipHome' => 1,
        ];

        $this->result = array_merge($itemsArr, $this->getNameAndCountFilters($user_id, ' and vip_status in (1)'));

    }

    public function getResult()
    {
        return $this->result;
    }

    public function getFilterCountResults(Request $request, $user_id = 0)
    {
        $nameView = 'user_adverts_view';
        $countQuery = $this->getQuery(DB::table($nameView)->where('vip_status', 1), $request);

        $this->result = ['countResults' => $countQuery->get()->count()];
    }
}
