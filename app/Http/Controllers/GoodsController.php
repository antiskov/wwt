<?php

namespace App\Http\Controllers;

use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\SparePartsMechanismType;
use App\Models\User;
use App\Services\CatalogService;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class GoodsController extends Controller
{
    public function index(User $user, Advert $advert, CatalogService $service)
    {


        return view('catalog.pages.item-page', $service->goodsIndex($user, $advert));
    }

}
