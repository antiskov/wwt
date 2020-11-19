<?php


namespace App\Services;


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
use Illuminate\Support\Facades\DB;

class CatalogService
{
    public function paginateArray($data, $perPage = 15, $path = 'none')
    {
        $page = Paginator::resolveCurrentPage();
        $total = count($data);
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        if($path != 'none') {
            return new LengthAwarePaginator($results, $total, $perPage, $page, [
                'path' => $path,
            ]);
        }

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }
    public function index(Request $request)
    {
        $brands = DB::table('catalog_view')->select('watch_make_title')
            ->addSelect(DB::raw('COUNT(watch_make_title) as count_watch_make_title'))
            ->groupBy('watch_make_title')->get();

        $models = DB::table('catalog_view')->select('watch_model_title')
            ->addSelect(DB::raw('COUNT(watch_model_title) as count_watch_model_title'))
            ->groupBy('watch_model_title')->get();

        $diameters = DB::table('catalog_view')->select('height', 'width')
            ->addSelect( DB::raw('COUNT(height) as count_height'))
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

        if($this->getFilter($request) == '1') {
            $adverts = DB::table('catalog_view')->whereRaw($this->getFilter($request))->paginate(6);
        } else {
            $adverts = $this->paginateArray(DB::table('catalog_view')->whereRaw($this->getFilter($request))->get()->toArray(), 6, $request->fullUrl());
        }
        \Cookie::queue(\Cookie::forget('searchLink'));
        setcookie("searchLink", $request->fullUrl(), time()+3600);

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

    public function goodsIndex(User $user, Advert $advert)
    {
        $expiresAt = now()->addHours(24);

        views($advert)
            ->cooldown($expiresAt)
            ->record();

        if(auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        $userLanguages = [];
        foreach ($user->languages as $l) {
            $userLanguages[] = $l->code;
        }

        if($advert->type == 'watch') {
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
            'userLanguages' => $userLanguages,
            'user' => $user,
            'favorite' => UserFavoriteAdvert::where('user_id', $user->id)->where('advert_id', $advert->id)->first(),
        ];
    }

    public function getFilter(Request $request)
    {
        $title = "";
        $query = '1';
        if (isset($request->brands)) {
            $title = "'".$request->brands[0]."'";
            foreach ($request->brands as $brand) {
                $title .= ", '$brand'";
            }
            $query .= " and watch_make_title in ($title)";
        }
        if (isset($request->models)) {
            $title = "'".$request->models[0]."'";
            foreach ($request->models as $model) {
                $title .= ", '$model'";
            }
            $query .= " and watch_model_title in ($title)";
        }
        if (isset($request->models)) {
            $title = "'".$request->models[0]."'";
            foreach ($request->models as $model) {
                $title .= ", '$model'";
            }
            $query .= " and watch_model_title in ($title)";
        }
        if (isset($request->diameters)) {
            $heightWidth  = explode('/', $request->diameters[0]);
            $height = $heightWidth[0];
            $width = $heightWidth[1];
            foreach ($request->diameters as $diameter) {
                $heightWidth  = explode('/', $diameter);
                $height .= ", $heightWidth[0]";
                $width .= ", $heightWidth[1]";
            }
            $query .= " and height in ($height) and width in ($width)";
        }
        if (isset($request->years)) {
            $title = $request->years[0];
            foreach ($request->years as $year) {
                $title .= ", $year";
            }
            $query .= " and release_year in ($title)";
        }
        if (isset($request->regions)) {
            $title = "'".$request->regions[0]."'";
            foreach ($request->regions as $region) {
                $title .= ", '$region'";
            }
            $query .= " and region in ($title)";
        }
        if (isset($request->mechanismTypes)) {
            $title = "'".$request->mechanismTypes[0]."'";
            foreach ($request->mechanismTypes as $mechanismType) {
                $title .= ", '$mechanismType'";
            }
            $query .= " and mechanism_type_title in ($title)";
        }
        if (isset($request->states)) {
            $title = "'".$request->states[0]."'";
            foreach ($request->states as $state) {
                $title .= ", '$state'";
            }
            $query .= " and watch_state in ($title)";
        }
        if (isset($request->deliveryVolumes)) {
            $title = "'".$request->deliveryVolumes[0]."'";
            foreach ($request->deliveryVolumes as $deliveryVolume) {
                $title .= ", '$deliveryVolume'";
            }
            $query .= " and delivery_volume in ($title)";
        }
        if (isset($request->sexes)) {
            $title = "'".$request->sexes[0]."'";
            foreach ($request->sexes as $sex) {
                $title .= ", '$sex'";
            }
            $query .= " and sex_title in ($title)";
        }
        if (isset($request->types)) {
            $title = "'".$request->types[0]."'";
            foreach ($request->types as $type) {
                $title .= ", '$type'";
            }
            $query .= " and watch_type_title in ($title)";
        }

        return $query;
    }

    public function getTabs(Request $request)
    {
        return ['adverts' => DB::table('catalog_view')->whereRaw($this->getFilter($request))->paginate(6)];
    }

    public function saveSearch()
    {
//        dd($_COOKIE["searchLink"]);
        $search = new SearchLink();
        $search->user()->associate(auth()->user());
        $search->link = $_COOKIE["searchLink"];
        $search->save();
    }
}
