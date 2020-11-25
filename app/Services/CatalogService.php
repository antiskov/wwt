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

    public function index(Request $request, $countPagination = 4)
    {
//        dd($request->orderBys);

        $brands = DB::table('catalog_view')->select('watch_make_title')
            ->addSelect(DB::raw('COUNT(watch_make_title) as count_watch_make_title'))
            ->groupBy('watch_make_title')->get();

        $models = DB::table('catalog_view')->select('watch_model_title')
            ->addSelect(DB::raw('COUNT(watch_model_title) as count_watch_model_title'))
            ->groupBy('watch_model_title')->get();

        $diameters = DB::table('catalog_view')->select('height', 'width')
            ->addSelect(DB::raw('COUNT(height) as count_height'))
            ->groupBy('height', 'width')->get();

        $years = DB::table('catalog_view')->select('release_year')
            ->addSelect(DB::raw('COUNT(release_year) as count_release_year'))
            ->groupBy('release_year')->get();

        $regions = DB::table('catalog_view')->select('region')
            ->addSelect(DB::raw('COUNT(region) as count_region'))
            ->groupBy('region')->get();

        $mechanismTypes = DB::table('catalog_view')->select('mechanism_type_title')
            ->addSelect(DB::raw('COUNT(mechanism_type_title) as count_mechanism_type_title'))
            ->groupBy('mechanism_type_title')->get();

        $states = DB::table('catalog_view')->select('watch_state')
            ->addSelect(DB::raw('COUNT(watch_state) as count_watch_state'))
            ->groupBy('watch_state')->get();

        $deliveryVolumes = DB::table('catalog_view')->select('delivery_volume')
            ->addSelect(DB::raw('COUNT(delivery_volume) as count_delivery_volume'))
            ->groupBy('delivery_volume')->get();

        $sexes = DB::table('catalog_view')->select('sex_title')
            ->addSelect(DB::raw('COUNT(sex_title) as count_sex_title'))
            ->groupBy('sex_title')->get();

        $types = DB::table('catalog_view')->select('watch_type_title')
            ->addSelect(DB::raw('COUNT(watch_type_title) as count_watch_type_title'))
            ->groupBy('watch_type_title')->get();

        $maxPrice = DB::table('catalog_view')->max('price');



        $adverts = $this->paginateCustom(DB::table('catalog_view')->whereRaw($this->getFilter($request))->orderBy('price', $this->getOrderBy($request)), $request->fullUrl(), $this->getCountPagination());

        if(strstr($request->fullUrl(), '?')){
            session_start();
            $_SESSION["searchLink"] = strstr($request->fullUrl(), '?');
        }

        if($request->states[0] == 'new' && !isset($request->states[1])) {
            $stateNew = 1;
        } else {
            $stateNew = 2;
        }

//        dd($request->fullUrl(), strstr($request->fullUrl(), 'states%5B%5D=new', true));

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
            'countResults' => DB::table('catalog_view')->whereRaw($this->getFilter($request))->get()->count(),
            'linkSearch' => $request->fullUrl(),
            'stateNew' => $stateNew,
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

    public function getTabs(Request $request)
    {
        return ['adverts' => DB::table('catalog_view')->whereRaw($this->getFilter($request))->paginate(6)];
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
}
