<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\AdvertImage;
use App\Models\Category;
use App\Models\DeliveryVolume;
use App\Models\DiameterWatch;
use App\Models\Glass;
use App\Models\MechanismType;
use App\Models\Province;
use App\Models\Sex;
use App\Models\State;
use App\Models\WatchAdvert;
use App\Models\WatchDial;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
use App\Models\WatchModel;
use App\Models\WatchType;
use App\Models\YearAdvert;
use Database\Seeders\DeliveryVolumeSeeder;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
//        foreach (Province::all() as $province) dump($province->adverts->where('type', 'watch'));
//        die;
        return view('catalog.pages.main', [
            'adverts' => Advert::where('type', 'watch')->get(),
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
        ]);
    }

    public function filter(Request $request)
    {
//        dd($request);
        return redirect()->back();
    }
}
