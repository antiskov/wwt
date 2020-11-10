<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\AdvertImage;
use App\Models\Category;
use App\Models\DeliveryVolume;
use App\Models\DiameterWatch;
use App\Models\Glass;
use App\Models\MechanismType;
use App\Models\Option;
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
use App\Services\CatalogService;
use Database\Seeders\DeliveryVolumeSeeder;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(CatalogService $service)
    {
        return view('catalog.pages.main', $service->index());
    }

    public function filter(Request $request)
    {
        dd($request);
        return redirect()->back();
    }
}
