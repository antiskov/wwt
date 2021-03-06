<?php

namespace App\Domain\AdvertsAndFilters;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerAdsGetter extends ToolsForAdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $query = DB::table($nameView)->where('user_id', $user_id);

        $adverts = $this->getAdverts($query, $request);

        $this->setSearchLink($request);



        $itemsArr = [
            'adverts' => $adverts,
            'countResults' => $query->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' =>  $this->setStateNew($request),
            'countUserAdverts' => $this->getCountUserAdverts($nameView, $user_id),
            'user' => User::find($user_id),
            'linkAvatar' => (new \App\Services\ProfileService())->getAvatar($user_id),
        ];

        $this->result = array_merge($itemsArr, $this->getNameAndCountFilters($user_id));
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getFilterCountResults(Request $request, $user_id = 0)
    {
        $nameView = 'user_adverts_view';
        $countQuery = $this->getQuery(DB::table($nameView)->where('user_id', $user_id), $request);

        $this->result = ['countResults' => $countQuery->get()->count()];
    }

}
