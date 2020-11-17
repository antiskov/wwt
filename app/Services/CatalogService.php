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
use App\Models\Sex;
use App\Models\SparePartsMechanismType;
use App\Models\State;
use App\Models\User;
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

class CatalogService
{
    public function index()
    {

//        $watchAdverts = new WatchAdvert();
//        foreach ($watchAdverts as $item) {
//            dump($item->only('release_year'));
//        }
//        dd($watchAdvert->only('release_year'));
        $watchAdverts = WatchAdvert::all();
        $years = [];
        $types = [];
        $categories = [];
        foreach ($watchAdverts as $watchAdvert) {
            $years[] = $watchAdvert->release_year;
            $types[] = $watchAdvert->watchType;
//            $categories[] = $watchAdvert->watchModel->category->id;
        }
        $uniqueYears = array_unique($years);
        rsort($uniqueYears);
        $uniqueTypes = array_unique($types);
        rsort($uniqueTypes);

        $adverts = Advert::all();
        $provinces = [];
        foreach ($adverts as $advert) {
//            dd($advert->id);
            $provinces[] = $advert->region;
        }
        $uniqueProvinces = array_unique($provinces);
        rsort($uniqueProvinces);

        return [
            'adverts' => Advert::where('type', 'watch')->paginate(6),
            'brands' => WatchMake::all(),
            'models' => WatchModel::all(),
            'types' => $uniqueTypes,
            'categories' => Category::all(),
            'watchAdverts' => WatchAdvert::paginate(6),
            'watchModels' => WatchModel::all(),
            'sex_man' => Sex::where('title', 'man')->first(),
            'sex_woman' => Sex::where('title', 'woman')->first(),
            'deliveryVolumes' => DeliveryVolume::all(),
            'mechanismTypes' => MechanismType::all(),
//            'diameters' => WatchAdvert::only('witdh')
            'years' => $uniqueYears,
            'provinces' => $uniqueProvinces,
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
        ];
    }
}
