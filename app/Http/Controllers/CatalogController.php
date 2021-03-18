<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\Status;
use App\Models\User;
use App\Services\CatalogService;
use App\Services\ProfileService;
use App\Services\RateService;
use App\Services\SubmittingService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Session;

class CatalogController extends Controller
{
    /**
     * @param CatalogService $service
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getFilterResult(CatalogService $service, Request $request)
    {
        return view('catalog.pages.main', $service->getFilterResult($request));
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getResultForHome(CatalogService $service, Request $request)
    {
        return view('pages.main', $service->getResultForHome($request));
    }

    /**
     * @param User $user
     * @param UserService $service
     * @return Application|Factory|View
     */
    public function sellerPage(User $user, UserService $service)
    {
        $status_id = Status::where('title', 'published')->first()->id;

        return view('catalog.pages.seller_page', [
            'user' => $user,
            'userLanguages' => $service->userLanguages($user),
            'adverts' => Advert::where('user_id', $user->id)->where('status_id', $status_id)->get(),
            'linkAvatar' => (new ProfileService())->getAvatar($user->id),
            'currency' => (new RateService())->checkRate(),
            'pageTitle' => 'WWT | '.$user->name,
        ]);
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveSearch(CatalogService $service, Request $request): RedirectResponse
    {
        $service->saveSearch($service->getFilterResult($request));

        return redirect()->back();
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @param $type
     * @param int $user
     * @return JsonResponse
     */
    public function countResults(CatalogService $service, Request $request, $type, $user = 0): JsonResponse
    {
        $a = $service->getFilterResults($request, $type, $user);

        $data = [
            'count' => $a['countResults']
        ];

        return response()->json($data);
    }

    /**
     * @param int $countPagination
     * @return RedirectResponse
     */
    public function countPagination($countPagination = 50): RedirectResponse
    {
        Cookie::queue(Cookie::make('countPagination', $countPagination));

        return redirect()->back();
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @param User $user
     * @return Application|Factory|View
     */
    public function sellerAds(CatalogService $service, Request $request, User $user)
    {
        return view('catalog.pages.seller_ads', $service->getResultForUser($request, $user->id));
    }

    /**
     * @param $currency
     * @return RedirectResponse
     */
    public function setRate($currency): RedirectResponse
    {
        Session::put('currency', $currency);
        $link = redirect()->back()->getSession()->all();
        $new_link = strstr($link['_previous']['url'], '?', true);

        if ($new_link){
            return redirect($new_link);
        }
        return redirect()->back();
    }

    /**
     * @param $value
     * @return RedirectResponse
     */
    public function setOrderPrice($value): RedirectResponse
    {
        Session::put('orderPrice', $value);

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function setOrderNew(): RedirectResponse
    {
        if (Session::has('orderNew')){
            Session::remove('orderNew');
        } else {
            Session::put('orderNew', 1);
        }

        dump(Session::get('orderNew'));
        return redirect()->back();
    }
}
