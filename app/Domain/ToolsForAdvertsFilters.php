<?php

namespace App\Domain;

use App\Contracts\AdvertsFilters;
use App\Models\Currency;
use App\Models\ExchangeRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

abstract class ToolsForAdvertsFilters implements AdvertsFilters
{
    public function changeToCurrencyPriceFilter($nameView = 'user_adverts_view')
    {
        $currency = $this->transRate();

        $maxPrice = DB::table($nameView)->max('price') * $currency['rate'];

        return $maxPrice;
    }

    public function changeFromCurrencyPriceFilter(Request $request)
    {
        $currency = $this->transRate();

        $prices[0] = $request->prices[0] / $currency['rate'];
        $prices[1] = $request->prices[1] / $currency['rate'];

        return $prices;
    }

    public function transRate()
    {
        if (Session::has('currency')) {
            if (\Session::get('currency') == 'UAH') {
                $rate = ExchangeRate::where('pair_currencies', 'USD/UAH')->first();
                $currency['rate'] = round($rate->rate, -1);
            } elseif (\Session::get('currency') == 'EUR') {
                $eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()->rate;
                $usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
                $currency['rate'] = round($eur / $usd, 3);
            } else {
                $currency['rate'] = 1;
            }
        } else {
            $currency['rate'] = 1;
        }

        return $currency;
    }

    public function checkRate()
    {
        if(Session::has('currency')){
            if (\Session::get('currency') == 'UAH') {
                $rate = ExchangeRate::where('pair_currencies', 'USD/UAH')->first();
                $currency['rate'] = round($rate->rate, -1);
                $currency['symbol'] = Currency::where('title', 'UAH')->first()->symbol;
            } elseif (\Session::get('currency') == 'EUR') {
                $eur = ExchangeRate::where('pair_currencies', 'EUR/UAH')->first()->rate;
                $usd = ExchangeRate::where('pair_currencies', 'USD/UAH')->first()->rate;
                $currency['rate'] = round($eur / $usd, 3);
                $currency['symbol'] = Currency::where('title', 'EUR')->first()->symbol;
            } else {
                $currency['rate'] = 1;
                $currency['symbol'] = Currency::where('title', 'USD')->first()->symbol;
            }
        } else {
            $currency['rate'] = 1;
            $currency['symbol'] = Currency::where('title', 'USD')->first()->symbol;
        }

        return $currency;
    }

    public function getNameAndCountFilters($user_id = 0, $additionalWhere = ' and 1', $nameView = 'user_adverts_view')
    {
        $brands = DB::table($nameView)->select('watch_make_title')
            ->addSelect(DB::raw('COUNT(watch_make_title) as count_watch_make_title'))
            ->groupBy('watch_make_title')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $models = DB::table($nameView)->select('watch_model_title')
            ->addSelect(DB::raw('COUNT(watch_model_title) as count_watch_model_title'))
            ->groupBy('watch_model_title')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $diameters = DB::table($nameView)->select('height', 'width')
            ->addSelect(DB::raw('COUNT(height) as count_height'))
            ->groupBy('height', 'width')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $years = DB::table($nameView)->select('release_year')
            ->addSelect(DB::raw('COUNT(release_year) as count_release_year'))
            ->groupBy('release_year')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $regions = DB::table($nameView)->select('region')
            ->addSelect(DB::raw('COUNT(region) as count_region'))
            ->groupBy('region')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $mechanismTypes = DB::table($nameView)->select('mechanism_type_title')
            ->addSelect(DB::raw('COUNT(mechanism_type_title) as count_mechanism_type_title'))
            ->groupBy('mechanism_type_title')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $states = DB::table($nameView)->select('watch_state')
            ->addSelect(DB::raw('COUNT(watch_state) as count_watch_state'))
            ->groupBy('watch_state')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $deliveryVolumes = DB::table($nameView)->select('delivery_volume')
            ->addSelect(DB::raw('COUNT(delivery_volume) as count_delivery_volume'))
            ->groupBy('delivery_volume')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $sexes = DB::table($nameView)->select('sex_title')
            ->addSelect(DB::raw('COUNT(sex_title) as count_sex_title'))
            ->groupBy('sex_title')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

        $types = DB::table($nameView)->select('watch_type_title')
            ->addSelect(DB::raw('COUNT(watch_type_title) as count_watch_type_title'))
            ->groupBy('watch_type_title')->whereRaw($this->getConditionUserId($user_id).$additionalWhere)->get();

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
            'maxPrice' => $this->changeToCurrencyPriceFilter(),
            'filter_currency' => $this->getFilterCurrency(),
            'currency' => $this->checkRate(),
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
        if($this->getBindsArr($request)){
            foreach ($this->getBindsArr($request) as $key => $value) {
                $query->whereIn($key, $value);
            }
        }

        if($request->has('prices')){
            $pricesArr = $this->changeFromCurrencyPriceFilter($request);
            $query->whereBetween('price', [$pricesArr[0], $pricesArr[1]]);
        }

        return $query;
    }
    public function paginateCustom($thisPaginate, $path, $perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);

        $total = $thisPaginate->getCountForPagination();
        if(!$perPage) $perPage = 50;
        $results = $total ? $thisPaginate->forPage($page, $perPage)->get($columns) : collect();
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => $path,
        ]);
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

        if ($diametersArr = $request->get('diameters', false)) {
            $heightWidth = explode('/', $diametersArr[0]);
            foreach ($diametersArr as $diameter) {
                $heightWidth = explode('/', $diameter);
                $bindsArr['height'][] = $heightWidth[0];
                $bindsArr['width'][] = $heightWidth[1];
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
        if($request->orderBy == 'dear') {
            return  'desc';
        } else {
            return  'asc';
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

    public function getUser($user_id)
    {
        return User::where('id', $user_id)->first();
    }
}
