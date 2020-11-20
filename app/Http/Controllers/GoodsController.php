<?php

namespace App\Http\Controllers;

use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\SparePartsMechanismType;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Services\CatalogService;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
//    public function index(User $user, Advert $advert, CatalogService $service)
//    {
//        return view('catalog.pages.item-page', $service->goodsIndex($user, $advert));
//    }
    public function index(Advert $advert, CatalogService $service)
    {
        $user = User::where('id', $advert->user_id)->first();
        return view('catalog.pages.item-page', $service->goodsIndex($user, $advert));
    }

    public function setFavorite(Advert $advert, $favorite)
    {
        $user = User::where('id', $advert->user_id)->first();
        if($favorite == 1) {
            $user->favoriteAdverts()->save($advert);
        } else {
            $favoriteAdvert = UserFavoriteAdvert::where('user_id', $user->id)->where('advert_id', $advert->id)->first();
            $favoriteAdvert->delete();
        }

        return response()->json($favorite);
    }

}
