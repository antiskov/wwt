<?php

namespace App\Domain\AdvertsAndFilters;

use App\Contracts\AdvertsFilters;
use App\Models\Currency;
use App\Services\RateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

abstract class ToolsForAdvertsFilters implements AdvertsFilters
{
    public function getAdverts($query, Request $request)
    {
        $adverts = $this->getQuery($query, $request)
            ->orderBy('vip_status', 'desc')
            ->orderBy('price', $this->getOrderBy($request))
            ->paginate($this->getCountPagination());

        $adverts->withPath($request->getUri());

        return $adverts;
    }
    public function changeToCurrencyPriceFilter($nameView = 'user_adverts_view')
    {
        $currency = (new RateService())->transRate();

        $maxPrice = DB::table($nameView)->max('price') * $currency['rate'];
        $minPrice = DB::table($nameView)->min('price') * $currency['rate'];

        return [
            'maxPrice' => round($maxPrice),
            'minPrice' => round($minPrice),
            ];
    }

    public function changeFromCurrencyPriceFilter(Request $request)
    {
        $currency = (new RateService())->transRate();

        $prices[0] = $request->prices[0] / $currency['rate'];
        $prices[1] = $request->prices[1] / $currency['rate'];

        return $prices;
    }

    public function getNameAndCountFilters($user_id = 0, $additionalWhere = ' and 1', $nameView = 'user_adverts_view')
    {
        $table = DB::table($nameView);

        $rule = $this->getConditionUserId($user_id).$additionalWhere;

        $newTable = clone $table;
        $brands = $newTable->select('watch_make_title')
            ->addSelect(DB::raw('COUNT(watch_make_title) as count_watch_make_title'))
            ->groupBy('watch_make_title')->whereRaw($rule)->get();

        $newTable = clone $table;
        $models = $newTable->select('watch_model_title')
            ->addSelect(DB::raw('COUNT(watch_model_title) as count_watch_model_title'))
            ->groupBy('watch_model_title')->whereRaw($rule)->get();

        $newTable = clone $table;
        $diameters = $newTable->select('height', 'width')->whereRaw($rule)->groupBy('height', 'width')->get();

        $newTable = clone $table;
        $years = $newTable->select('release_year')
            ->addSelect(DB::raw('COUNT(release_year) as count_release_year'))
            ->groupBy('release_year')->whereRaw($rule)->get();

        $newTable = clone $table;
        $regions = $newTable->select('region')
            ->addSelect(DB::raw('COUNT(region) as count_region'))
            ->groupBy('region')->whereRaw($rule)->get();

        $newTable = clone $table;
        $mechanismTypes = $newTable->select('mechanism_type_title')
            ->addSelect(DB::raw('COUNT(mechanism_type_title) as count_mechanism_type_title'))
            ->groupBy('mechanism_type_title')->whereRaw($rule)->get();

        $newTable = clone $table;
        $states = $newTable->select('watch_state')
            ->addSelect(DB::raw('COUNT(watch_state) as count_watch_state'))
            ->groupBy('watch_state')->whereRaw($rule)->get();

        $newTable = clone $table;
        $deliveryVolumes = $newTable->select('delivery_volume')
            ->addSelect(DB::raw('COUNT(delivery_volume) as count_delivery_volume'))
            ->groupBy('delivery_volume')->whereRaw($rule)->get();

        $newTable = clone $table;
        $sexes = $newTable->select('sex_title')
            ->addSelect(DB::raw('COUNT(sex_title) as count_sex_title'))
            ->groupBy('sex_title')->whereRaw($rule)->get();

        $newTable = clone $table;
        $types = $newTable->select('watch_type_title')
            ->addSelect(DB::raw('COUNT(watch_type_title) as count_watch_type_title'))
            ->groupBy('watch_type_title')->whereRaw($rule)->get();

        $prices = $this->changeToCurrencyPriceFilter();

        if (!Session::has('currency')) {
            \Session::put('currency', 'USD');
        }

        return [
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
            'maxPrice' => $prices['maxPrice'],
            'minPrice' => $prices['minPrice'],
            'filter_currency' => $this->getFilterCurrency(),
            'currency' => (new RateService())->checkRate(),
            'currencies' => Currency::all(),
        ];
    }

    public function getFilterCurrency()
    {
        if(Session::has('currency')){
            return Session::get('currency');
        } else {
            return 'USD';
        }
    }
    public function getQuery($query, Request $request)
    {
        $bindsArr = $this->getBindsArr($request);

        if($bindsArr){
            foreach ($bindsArr as $key => $value) {
                $query->whereIn($key, $value);
            }
        }


        if($request->has('prices')){
            $pricesArr = $this->changeFromCurrencyPriceFilter($request);
            $query->whereBetween('price', [$pricesArr[0], $pricesArr[1]+1]);
        }

        return $query;
    }

    public function getBindsArr(Request $request)
    {
        $bindsArr = [];

        if ($brandsArr = $request->get('brands', false)) {
            $bindsArr['watch_make_title'] = $brandsArr;
        }

        if ($modelsArr = $request->get('models', false)) {
            $bindsArr['watch_model_title'] = $modelsArr;
        }

        if ($diametersArr = $request->get('diameters')) {
            $heightWidth = explode('/', $diametersArr[0]);
            foreach ($diametersArr as $diameter) {
                $heightWidth = explode('/', $diameter);
                $bindsArr['height'][] = $heightWidth[0];
                if (isset($heightWidth[1])){
                    $bindsArr['width'][] = $heightWidth[1];
                }

            }
            $bindsArr['height'] = array_unique($bindsArr['height']);
            if (isset( $bindsArr['width'])){
                $bindsArr['width'] = array_unique($bindsArr['width']);
            }

        }

        if ($yearsArr = $request->get('years', false)) {
            $bindsArr['release_year'] = $yearsArr;
        }

        if ($regionsArr = $request->get('regions', false)) {
            $bindsArr['region'] = $regionsArr;
        }

        if ($mechanismTypesArr = $request->get('mechanismTypes', false)) {
            $bindsArr['mechanism_type_title'] = $mechanismTypesArr;
        }

        if ($statesArr = $request->get('states', false)) {
            $bindsArr['watch_state'] = $statesArr;
        }

        if ($deliveryVolumesArr = $request->get('deliveryVolumes', false)) {
            $bindsArr['delivery_volume'] = $deliveryVolumesArr;
        }

        if ($sexesArr = $request->get('sexes', false)) {
            $bindsArr['sex_title'] = $sexesArr;
        }

        if ($typesArr = $request->get('types', false)) {
            $bindsArr['watch_type_title'] = $typesArr;
        }

        return $bindsArr;
    }

    public function getCountPagination()
    {
        if(!isset($_COOKIE["countPagination"])) {
            Cookie::queue(Cookie::make('countPagination', 50));
            return 50;
        } elseif($_COOKIE["countPagination"] == 'count_results') {
            Cookie::queue(Cookie::make('countPagination', 50));
            return 50;
        } else {
            return Cookie::get('countPagination');
        }
    }

    public function getConditionUserId($user_id)
    {
        if($user_id == 0) {
            return '1';
        } else {
            return "user_id in ($user_id)";
        }
    }

    public function setSearchLink(Request $request)
    {
        if(strstr($request->fullUrl(), '?')){
            Session::put('searchLink', strstr($request->fullUrl(), '?'));
        }
    }

    public function getOrderBy(Request $request)
    {
        if (isset($_COOKIE['price_sort'])) {
            if ($_COOKIE['price_sort'] == 'cheap') {
                return 'asc';
            } else {
                return 'desc';
            }
        }

        if ($request->orderBy == 'cheap') {
            return 'asc';
        } else {
            return 'desc';
        }
    }

    public function setStateNew(Request $request)
    {
        if(isset($request->states) && (($request->states[0] == 'new' && !isset($request->states[1])) || ($request->states[0] == 'new' && $request->states[0] == $request->states[1]))) {
            $stateNew = 1;
        } else {
            $stateNew = 2;
        }

        return $stateNew;
    }

    public function getCountUserAdverts($nameView, $user_id)
    {
        $count = DB::table($nameView)->select(DB::raw('COUNT(id) as count'))->whereRaw("user_id = $user_id")->get();

        return $count[0];
    }
}
