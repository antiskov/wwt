<?php

namespace App\Domain\AdvertsAndFilters;

use App\Contracts\AdvertsFilters;
use App\Domain\ToolsForAdvertsFilters;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerAdsGetter extends ToolsForAdvertsFilters implements AdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $query = DB::table($nameView)->where('user_id', $user_id);

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
            'countUserAdverts' => $this->getCountUserAdverts($nameView, $user_id),
            'user' => $this->getUser($user_id),
        ];

        $this->result = array_merge($itemsArr, $this->getNameAndCountFilters($user_id));
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getFilterCountResults(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $nameView = 'user_adverts_view';
        $countQuery = $this->getQuery(DB::table($nameView)->where('user_id', $user_id), $request);

        $this->result = ['countResults' => $countQuery->get()->count()];
    }

}
