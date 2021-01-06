<?php

namespace App\Http\Controllers;


use App\Domain\AdvertsAndFilters\VipAdvertsAndFiltersGetter;
use App\Services\ImageMinificationService;
use App\Services\PayService;
use App\Services\ProfileService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

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
        $advertFilter->index($request);

        return view('pages.main', $advertFilter->getResult());
    }

    /**
     * @param ProfileService $req
     * @return Application|Factory|View
     */
    public function test(ImageMinificationService $req)
    {
        $req->minify('public/small_acc.jpeg', ['medium', 'big', 'small']);

        return view('pages.main');
    }

    /**
     * @param Request $request
     * @param SubscribeService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request, SubscribeService $service)
    {
        $service->setSubscribe($request->get('email'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param SubscribeService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unsubscribe(Request $request, SubscribeService $service)
    {
        $service->changeSubscribe($request->get('email'), 0);

        return redirect()->route('home');
    }

    /**
     * @param $order_id
     * @param PayService $service
     * @return Application|Factory|\Illuminate\View\View
     */
    public function getStatusPay($order_id, PayService $service)
    {
        if($service->getCheckStatusPay($order_id) == 'success'){
            return view('pages.status_pay', ['status' => 1]);
        } else {
            return view('pages.status_pay', ['status' => 0  ]);
        }
    }

    /**
     * @return Application|Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        return view('pages.about');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendAbout(Request $request)
    {
        Mail::to($request->email)->send(new SendAbout($request));

        return redirect()->back();
    }

    /**
     * @param string $lang
     */
    public function setLocale(string $lang)
    {
        Cookie::queue(Cookie::make('language', $lang));
    }
}
