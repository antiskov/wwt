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
    /**
     * @param Advert $advert
     * @param CatalogService $service
     * @param UserService $userService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Advert $advert, CatalogService $service, UserService $userService)
    {
        $user = User::where('id', $advert->user_id)->first();
        return view('catalog.pages.item-page', $service->goodsIndex($user, $advert, $userService));
    }

    /**
     * @param Advert $advert
     * @param $favorite
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Advert $advert
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showPhone(Advert $advert, Request $request)
    {
        $advert->number_phone_show = $advert->number_phone_show + 1;
        $advert->save();

        $data = [
            'output' => view('catalog.modals.item-page-phone', ['advert' => $advert])->toHtml(),
        ];

        return response()->json($data);
    }

}
