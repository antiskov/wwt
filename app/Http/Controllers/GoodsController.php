<?php

namespace App\Http\Controllers;

use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\SparePartsMechanismType;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Services\CatalogService;
use App\Services\UserService;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index(Advert $advert, CatalogService $service, UserService $userService)
    {
        $user = User::where('id', $advert->user_id)->first();
        return view('catalog.pages.item-page', $service->goodsIndex($user, $advert, $userService));
    }

    public function setFavorite(Advert $advert, $favorite)
    {
        $user = auth()->user();
        if($favorite == 1) {
            $user->favoriteAdverts()->save($advert);
        } else {
            $favoriteAdvert = UserFavoriteAdvert::where('user_id', $user->id)->where('advert_id', $advert->id)->first();
            $favoriteAdvert->delete();
        }

        return response()->json($favorite);
    }

    public function showPhone(Advert $advert, Request $request)
    {
//        dd($request);

        $advert->number_phone_show = $advert->number_phone_show + 1;
        $advert->save();

        $data = [
            'output' => "<a href='tel:{$advert->user->phone}' class='phone'>{$advert->user->phone}</a>"
        ];

        return response()->json($data);
    }

}
