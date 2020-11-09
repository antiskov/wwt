<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\AdvertImage;
use App\Models\DiameterWatch;
use App\Models\Province;
use App\Models\WatchMake;
use App\Models\WatchModel;
use App\Models\YearAdvert;
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
        ]);
    }

    public function filter(Request $request)
    {
//        dd($request);
        return redirect()->back();
    }
}
