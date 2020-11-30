<?php

namespace App\Domain\AdvertsAndFilters;

use App\Contracts\AdvertsFilters;
use App\Domain\ToolsForAdvertsFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertsFiltersGetter extends ToolsForAdvertsFilters implements AdvertsFilters
{
    protected $result;

    public function index(Request $request, $user_id = 0, $nameView = 'user_adverts_view')
    {
        $brands = DB::table($nameView)->select('watch_make_title')
            ->addSelect(DB::raw('COUNT(watch_make_title) as count_watch_make_title'))
            ->groupBy('watch_make_title')->whereRaw($this->getConditionUserId($user_id))->get();

        $models = DB::table($nameView)->select('watch_model_title')
            ->addSelect(DB::raw('COUNT(watch_model_title) as count_watch_model_title'))
            ->groupBy('watch_model_title')->whereRaw($this->getConditionUserId($user_id))->get();

        $diameters = DB::table($nameView)->select('height', 'width')
            ->addSelect(DB::raw('COUNT(height) as count_height'))
            ->groupBy('height', 'width')->whereRaw($this->getConditionUserId($user_id))->get();

        $years = DB::table($nameView)->select('release_year')
            ->addSelect(DB::raw('COUNT(release_year) as count_release_year'))
            ->groupBy('release_year')->whereRaw($this->getConditionUserId($user_id))->get();

        $regions = DB::table($nameView)->select('region')
            ->addSelect(DB::raw('COUNT(region) as count_region'))
            ->groupBy('region')->whereRaw($this->getConditionUserId($user_id))->get();

        $mechanismTypes = DB::table($nameView)->select('mechanism_type_title')
            ->addSelect(DB::raw('COUNT(mechanism_type_title) as count_mechanism_type_title'))
            ->groupBy('mechanism_type_title')->whereRaw($this->getConditionUserId($user_id))->get();

        $states = DB::table($nameView)->select('watch_state')
            ->addSelect(DB::raw('COUNT(watch_state) as count_watch_state'))
            ->groupBy('watch_state')->whereRaw($this->getConditionUserId($user_id))->get();

        $deliveryVolumes = DB::table($nameView)->select('delivery_volume')
            ->addSelect(DB::raw('COUNT(delivery_volume) as count_delivery_volume'))
            ->groupBy('delivery_volume')->whereRaw($this->getConditionUserId($user_id))->get();

        $sexes = DB::table($nameView)->select('sex_title')
            ->addSelect(DB::raw('COUNT(sex_title) as count_sex_title'))
            ->groupBy('sex_title')->whereRaw($this->getConditionUserId($user_id))->get();

        $types = DB::table($nameView)->select('watch_type_title')
            ->addSelect(DB::raw('COUNT(watch_type_title) as count_watch_type_title'))
            ->groupBy('watch_type_title')->whereRaw($this->getConditionUserId($user_id))->get();

        $maxPrice = DB::table($nameView)->max('price');

        $adverts = $this->paginateCustom(
            DB::table($nameView)
                ->whereRaw($this->getFilter($request).' and '.$this->getConditionUserId($user_id))
                ->orderBy('vip_status', 'desc')
                ->orderBy('price', $this->getOrderBy($request)),
            $request->fullUrl(),
            $this->getCountPagination()
        );

        $this->setSearchLink($request);

        $this->result = [
            'adverts' => $adverts,
            'brands' => $brands,
            'models' => $models,
            'mechanismTypes' => $mechanismTypes,
            'diameters' => $diameters,
            'years' => $years,
            'regions' => $regions,
            'states' => $states,
            'deliveryVolumes' => $deliveryVolumes,
            'sexes' => $sexes,
            'types' => $types,
            'maxPrice' => $maxPrice,
            'countResults' => DB::table($nameView)->whereRaw($this->getFilter($request))->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' =>  $this->setStateNew($request),
        ];
    }

    public function getResult()
    {
        return $this->result;
    }
}