<?php

namespace App\Http\Controllers;


use App\Models\Advert;
use App\Models\User;
use App\Services\CatalogService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{
    public function getFilterResult(CatalogService $service, Request $request)
    {
//        dd( $service->getFilterResult($request));
        return view('catalog.pages.main', $service->getFilterResult($request));
    }

    public function getResultForHome(CatalogService $service, Request $request)
    {
        return view('pages.main', $service->getResultForHome($request));
    }

//    public function filterJson(Request $request, CatalogService $service)
//    {
//        $data = [
//            'output' => view('catalog.modals.global.tabs', $service->getTabs($request))->toHtml(),
//        ];
//
//        return response()->json($data);
//    }

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
        $service->saveSearch($service->getFilterResult($request));

        return redirect()->back();
    }

    public function countResults(CatalogService $service, Request $request, $type, $user = 0)
    {
//        dump($request->all());
        $a = $service->getFilterResults($request, $type, $user);

        $data = [
            'count' => $a['countResults']
        ];

        return response()->json($data);
    }

    public function countPagination($countPagination = 50)
    {
        Cookie::queue(Cookie::make('countPagination', $countPagination));

        return redirect()->back();
    }

    public function sellerAds(CatalogService $service, Request $request, User $user)
    {
        return view('catalog.pages.seller_ads', $service->getResultForUser($request, $user->id));
    }

    public function setRate($currency)
    {
        \Session::put('currency', $currency);

        return redirect()->route('catalog');
    }
}
