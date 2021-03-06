<?php


namespace App\Services;



use App\Domain\AdvertsAndFilters\AdvertsFiltersGetter;
use App\Domain\AdvertsAndFilters\SellerAdsGetter;
use App\Domain\AdvertsAndFilters\VipAdvertsAndFiltersGetter;
use App\Models\AccessoryMechanismType;
use App\Models\Advert;
use App\Models\MechanismType;
use App\Models\SearchLink;
use App\Models\SparePartsMechanismType;
use App\Models\Status;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CatalogService
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getFilterResult(Request $request)
    {
        $advertFilter = new AdvertsFiltersGetter();
        $advertFilter->index($request);

        return $advertFilter->getResult();
    }

    /**
     * @param $serviceArray
     */
    public function saveSearch($serviceArray)
    {
        $filters = json_encode($serviceArray['adverts']);

        $search = new SearchLink();
        $search->user()->associate(auth()->user());
        $search->filter = $filters;

        if (Session::get('searchLink')){
            $search->link_search = route('catalog-favorite', [Session::get('searchLink')]);
        } else {
            $search->link_search = route('catalog-favorite', '');
        }

        if ($_COOKIE['search_title']){
            $search->title = $_COOKIE['search_title'];
            if (!$search->save()) {
                Log::info("Search request #$search->id not saved");
            }
        }
    }

    /**
     * @param Request $request
     * @param int $user_id
     * @return mixed
     */
    public function getResultForUser(Request $request, $user_id = 0)
    {
        $adverts = new SellerAdsGetter();
        $adverts->index($request, $user_id);

        return $adverts->getResult();
    }

    /**
     * @param Request $request
     * @param int $user_id
     * @return mixed
     */
    public function getResultForHome(Request $request, $user_id = 0)
    {
        $adverts = new VipAdvertsAndFiltersGetter();
        $adverts->index($request, $user_id);

        return $adverts->getResult();
    }

    /**
     * @param Request $request
     * @param $type
     * @param int $user_id
     * @return null
     */
    public function getFilterResults(Request $request, $type, $user_id = 0)
    {
        if($type == 3 && $user_id != 0) {
            $adverts = new SellerAdsGetter();
        } elseif ($type == 1) {
            $adverts = new AdvertsFiltersGetter();
        } elseif ($type == 2) {
            $adverts = new VipAdvertsAndFiltersGetter();
        }

        if(isset($adverts)){
            $adverts->getFilterCountResults($request, $user_id);

            return $adverts->getResult();
        } else {
            return null;
        }

    }
    //todo: refactor ?? ?????????????????? ??????????????, ?????????? ???????????? ???????????????? ?????? ???????????????? ?? ????????????????????
    public function goodsIndex(User $user, Advert $advert, UserService $userService)
    {
        $expiresAt = now()->addHours(24);

        views($advert)->cooldown($expiresAt)->record();

        if (auth()->user()) {
            $role = auth()->user()->role_id;
        } else {
            $role = 1;
        }

        if ($advert->type == 'watch') {
            $mechanismType = MechanismType::where('id', $advert->watchAdvert->mechanism_type_id)->first();
        } elseif ($advert->type == 'accessories') {
            $mechanismType = AccessoryMechanismType::where('id', $advert->accessoryAdvert->accessory_mechanism_type_id)->first();
        } else {
            $mechanismType = SparePartsMechanismType::where('id', $advert->sparePartsAdvert->spare_parts_mechanism_type_id)->first();
        }

        if(!isset($mechanismType)){
            return redirect()->with();
        }

        return [
            'role' => $role,
            'advert' => $advert,
            'mechanismType' => $mechanismType->title,
            'userLanguages' => $userService->userLanguages($user),
            'user' => $user,
            'favorite' => UserFavoriteAdvert::where('user_id', $user->id)->where('advert_id', $advert->id)->first(),
            'currency' => (new RateService())->checkRate(),
            'statuses' => Status::all(),
            'linkAvatar' => (new \App\Services\ProfileService())->getAvatar($user->id),
            'pageTitle' => 'WWT | '.$advert->title
        ];
    }
}
