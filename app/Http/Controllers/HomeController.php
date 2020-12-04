<?php

namespace App\Http\Controllers;


use App\Domain\AdvertsAndFilters\AdvertsFiltersGetter;
use App\Domain\AdvertsAndFilters\VipAdvertsAndFiltersGetter;
use App\Domain\AdvertsFiltersDirector;
use App\Http\Requests\ManagePasswordRequest;
use App\Mail\RegisterEmail;
use App\Models\User;
use App\Services\ImageMinificationService;
use App\Services\PasswordService;
use App\Services\PayService;
use App\Services\ProfileService;
use App\Services\SubscribeService;
use App\Services\UserService;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * @param UserService $user
     * @return Application|Factory|View
     */
    public function main(Request $request) {
        if(!Cookie::get('referral_code')){
            Cookie::queue(Cookie::make('referral_code', $request->referral_code));
        }
        $advertFilter = new VipAdvertsAndFiltersGetter();
        $director = new AdvertsFiltersDirector();
        $director->setQueryToDB($request, $advertFilter);

        return view('pages.main', $director->getResult());
    }

    /**
     * @param ProfileService $req
     * @return Application|Factory|View
     */
    public function test(ImageMinificationService $req)
    {
        $req->minify('public/acc.jpeg', ['medium', 'big', 'small']);

        return view('pages.main');
    }

    public function subscribe(Request $request, SubscribeService $service)
    {
        $service->setSubscribe($request->get('email'));

        return redirect()->back();
    }

    public function unsubscribe(Request $request, SubscribeService $service)
    {
        $service->changeSubscribe($request->get('email'), 0);

        return redirect()->route('home');
    }

    public function getStatusPay($order_id, PayService $service)
    {
        if($service->getCheckStatusPay($order_id) == 'success'){
            return view('pages.status_pay', ['status' => 1]);
        } else {
            return view('pages.status_pay', ['status' => 0  ]);
        }
    }
}
