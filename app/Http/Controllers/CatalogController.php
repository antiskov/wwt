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
use App\Models\SearchLink;
use App\Models\Sex;
use App\Models\State;
use App\Models\User;
use App\Models\WatchAdvert;
use App\Models\WatchDial;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
use App\Models\WatchModel;
use App\Models\WatchType;
use App\Models\YearAdvert;
use App\Services\CatalogService;
use App\Services\CustomPaginateService;
use App\Services\UserService;
use Database\Seeders\DeliveryVolumeSeeder;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(CatalogService $service, Request $request)
    {
        return view('catalog.pages.main', $service->index($request));
    }

    public function filter(CatalogService $service, Request $request)
    {
        return view('catalog.pages.main', $service->index($request));
    }

    public function filterJson(Request $request, CatalogService $service)
    {
        $data = [
            'output' => view('catalog.modals.global.tabs', $service->getTabs($request))->toHtml(),
        ];

        return response()->json($data);
    }

    public function indexAccessory(CatalogService $service)
    {
        return view('catalog.pages.accessory', $service->indexAccessory());
    }

    public function indexSparePart(CatalogService $service)
    {
        return view('catalog.pages.spare_parts', $service->indexSparePart());
    }

    public function sellerPage(User $user, UserService $service)
    {
        return view('catalog.pages.seller_page', [
            'user' => $user,
            'userLanguages' => $service->userLanguages($user),
            'adverts' => Advert::where('user_id', $user->id)->get(),
        ]);
    }

    public function saveSearch(CatalogService $service, Request $request)
    {
        $service->saveSearch($service->index($request));

        return redirect()->back();
    }

    public function countResults(CatalogService $service, Request $request)
    {
        $service->index($request);
        $a = $service->index($request);

        $data = [
            'count' => $a['countResults']
        ];

        return response()->json($data);
    }

}
