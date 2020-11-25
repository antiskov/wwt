<?php


namespace App\Services;


use App\Domain\FilterDirector;
use App\Domain\filters\WatchFilter;
use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\BraceletClasp;
use App\Models\BraceletColor;
use App\Models\BraceletMaterial;
use App\Models\Category;
use App\Models\DeliveryVolume;
use App\Models\DiameterWatch;
use App\Models\Glass;
use App\Models\MaterialsClasp;
use App\Models\MechanismType;
use App\Models\Option;
use App\Models\Province;
use App\Models\SearchLink;
use App\Models\Sex;
use App\Models\SparePartsMechanismType;
use App\Models\State;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Models\WatchAdvert;
use App\Models\WatchBezel;
use App\Models\WatchDial;
use App\Models\WatchFigure;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
use App\Models\WatchModel;
use App\Models\WatchThickness;
use App\Models\WatchType;
use App\Models\WatchWaterproof;
use App\Models\WidthClasp;
use App\Models\YearAdvert;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CatalogService
{
    public function paginateCustom($thisPaginate, $path, $perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
//        dd($perPage);
        $page = $page ?: Paginator::resolveCurrentPage($pageName);

        $total = $thisPaginate->getCountForPagination();

        $results = $total ? $thisPaginate->forPage($page, $perPage)->get($columns) : collect();
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => $path,
        ]);
    }

    public function index(Request $request, $nameView = 'catalog_view', $user_id = 0)
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
//            ->groupBy('region')->whereRaw(($user_id == 0) ? "and user_id ($user_id)" : "") ->get();
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

        $adverts = $this->paginateCustom(DB::table($nameView)->whereRaw($this->getFilter($request).' and '.$this->getConditionUserId($user_id))->orderBy('price', $this->getOrderBy($request)), $request->fullUrl(), $this->getCountPagination());

        $this->setSearchLink($request);

        return [
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

    public function indexAccessory()
    {
        return [
            'adverts' => Advert::where('type', 'accessories')->paginate(6),
            'brands' => WatchMake::all(),
            'models' => WatchModel::all(),
            'diameters' => DiameterWatch::all(),
            'years' => YearAdvert::all(),
            'provinces' => Province::all(),
            'types' => WatchType::all(),
            'categories' => Category::all(),
            'watchAdverts' => WatchAdvert::all(),
            'watchModels' => WatchModel::all(),
            'sex_man' => Sex::where('title', 'man')->first(),
            'sex_woman' => Sex::where('title', 'woman')->first(),
            'states' => State::all(),
            'deliveryVolumes' => DeliveryVolume::all(),
            'mechanismTypes' => MechanismType::all(),
            'watchMaterials' => WatchMaterial::all(),
            'watchDials' => WatchDial::all(),
            'glasses' => Glass::all(),
            'options' => Option::all(),
            'thicknesses' => WatchThickness::all(),
            'bezels' => WatchBezel::all(),
            'figures' => WatchFigure::all(),
            'waterproofs' => WatchWaterproof::all(),
            'bracelets' => BraceletMaterial::all(),
            'clasps' => BraceletClasp::all(),
            'materialsClasps' => MaterialsClasp::all(),
            'braceletColors' => BraceletColor::all(),
            'widthClasps' => WidthClasp::all(),
        ];
    }

    public function indexSparePart()
    {
        return [
            'adverts' => Advert::where('type', 'parts')->paginate(6),
            'brands' => WatchMake::all(),
            'models' => WatchModel::all(),
            'diameters' => DiameterWatch::all(),
            'years' => YearAdvert::all(),
            'provinces' => Province::all(),
            'types' => WatchType::all(),
            'categories' => Category::all(),
            'watchAdverts' => WatchAdvert::all(),
            'watchModels' => WatchModel::all(),
            'sex_man' => Sex::where('title', 'man')->first(),
            'sex_woman' => Sex::where('title', 'woman')->first(),
            'states' => State::all(),
            'deliveryVolumes' => DeliveryVolume::all(),
            'mechanismTypes' => MechanismType::all(),
            'watchMaterials' => WatchMaterial::all(),
            'watchDials' => WatchDial::all(),
            'glasses' => Glass::all(),
            'options' => Option::all(),
            'thicknesses' => WatchThickness::all(),
            'bezels' => WatchBezel::all(),
            'figures' => WatchFigure::all(),
            'waterproofs' => WatchWaterproof::all(),
            'bracelets' => BraceletMaterial::all(),
            'clasps' => BraceletClasp::all(),
            'materialsClasps' => MaterialsClasp::all(),
            'braceletColors' => BraceletColor::all(),
            'widthClasps' => WidthClasp::all(),
        ];
    }

    public function goodsIndex(User $user, Advert $advert, UserService $userService)
    {
        $expiresAt = now()->addHours(24);

        views($advert)
            ->cooldown($expiresAt)
            ->record();

        if (auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        if ($advert->type == 'watch') {
            $mechanismType = MechanismType::where('id', $advert->watchAdvert->mechanism_type_id)->first();
        } elseif ($advert->type == 'accessories') {
            $mechanismType = AccessoryMechanismType::where('id', $advert->accessoryAdvert->accessory_mechanism_type_id)->first();
        } else {
            $mechanismType = SparePartsMechanismType::where('id', $advert->sparePartsAdvert->spare_parts_mechanism_type_id)->first();
        }

        return [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userService->userLanguages($user),
            'user' => $user,
            'favorite' => UserFavoriteAdvert::where('user_id', $user->id)->where('advert_id', $advert->id)->first(),
        ];
    }

    public function getFilter(Request $request)
    {
        $watchFilter = new WatchFilter();
        $director = new FilterDirector();
        $director->createQueryWatchFilter($request, $watchFilter);
        $query = $director->getQuery();

        return $query;
    }

    public function getTabs(Request $request, $nameView = 'catalog_view')
    {
        return ['adverts' => DB::table($nameView)->whereRaw($this->getFilter($request))->paginate(6)];
    }

    public function saveSearch($serviceArray)
    {
        session_start();

        $filters = json_encode($serviceArray['adverts']);

        $search = new SearchLink();
        $search->user()->associate(auth()->user());
        $search->filter = $filters;
        $search->link_search = $_SESSION["searchLink"];
        $search->title = 'Example name';
        $search->save();
    }

    public function getOrderBy(Request $request)
    {
        if($request->orderBy == 'dear') {
            return  'desc';
        } else {
            return  'asc';
        }
    }

    public function getCountPagination()
    {
        if(!isset($_COOKIE["countPagination"])) {
            return $_COOKIE["countPagination"] = 50;
        } elseif($_COOKIE["countPagination"] == 'count_results') {
            return $_COOKIE["countPagination"] = 50;
        } else {
            return $_COOKIE["countPagination"];
        }
    }

    public function setSearchLink(Request $request)
    {
        if(strstr($request->fullUrl(), '?')){
            session_start();
            $_SESSION["searchLink"] = strstr($request->fullUrl(), '?');
        }
    }

    public function setStateNew(Request $request)
    {
        if($request->states[0] == 'new' && !isset($request->states[1])) {
            $stateNew = 1;
        } else {
            $stateNew = 2;
        }

        return $stateNew;
    }

    public function getConditionUserId($user_id)
    {
        if($user_id == 0) {
            return '1';
        } else {
            return "user_id in ($user_id)";
        }
    }
}
