<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\Status;
use App\Models\User;
use App\Services\CatalogService;
use App\Services\RateService;
use App\Services\SubmittingService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{
    /**
     * @param CatalogService $service
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFilterResult(CatalogService $service, Request $request)
    {
        return view('catalog.pages.main', $service->getFilterResult($request));
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getResultForHome(CatalogService $service, Request $request)
    {
        return view('pages.main', $service->getResultForHome($request));
    }

    /**
     * @param User $user
     * @param UserService $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sellerPage(User $user, UserService $service)
    {
        $status_id = Status::where('title', 'published')->first()->id;

        return view('catalog.pages.seller_page', [
            'user' => $user,
            'userLanguages' => $service->userLanguages($user),
            'adverts' => Advert::where('user_id', $user->id)->where('status_id', $status_id)->get(),
            'linkAvatar' => (new \App\Services\ProfileService())->getAvatar($user->id),
            'currency' => (new RateService())->checkRate(),
            'pageTitle' => 'WWT | '.$user->name,
        ]);
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveSearch(CatalogService $service, Request $request)
    {
        $service->saveSearch($service->getFilterResult($request));

        return redirect()->back();
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @param $type
     * @param int $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function countResults(CatalogService $service, Request $request, $type, $user = 0)
    {
        $a = $service->getFilterResults($request, $type, $user);

        $data = [
            'count' => $a['countResults']
        ];

        return response()->json($data);
    }

    /**
     * @param int $countPagination
     * @return \Illuminate\Http\RedirectResponse
     */
    public function countPagination($countPagination = 50)
    {
        Cookie::queue(Cookie::make('countPagination', $countPagination));

        return redirect()->back();
    }

    /**
     * @param CatalogService $service
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sellerAds(CatalogService $service, Request $request, User $user)
    {
        return view('catalog.pages.seller_ads', $service->getResultForUser($request, $user->id));
    }

    /**
     * @param $currency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setRate($currency)
    {
        \Session::put('currency', $currency);

        return redirect()->back();
    }

    public function setOrderPrice($value)
    {
        \Session::put('orderPrice', $value);

        return redirect()->back();
    }

    public function setOrderNew()
    {
        if (\Session::has('orderNew')){
            \Session::remove('orderNew');
        } else {
            \Session::put('orderNew', 1);
        }

        dump(\Session::get('orderNew'));
        return redirect()->back();
    }
}
