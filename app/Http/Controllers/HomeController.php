<?php

namespace App\Http\Controllers;


use App\Domain\AdvertsAndFilters\VipAdvertsAndFiltersGetter;
use App\Mail\OrderAd;
use App\Mail\SendAbout;
use App\Services\ImageMinificationService;
use App\Services\PayService;
use App\Services\ProfileService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return ApplicationAlias|Factory|View
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
     * @param Request $request
     * @param SubscribeService $service
     * @return RedirectResponse
     */
    public function subscribe(Request $request, SubscribeService $service): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);
        $service->setSubscribe($request->get('email'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param SubscribeService $service
     * @return RedirectResponse
     */
    public function unsubscribe(Request $request, SubscribeService $service): RedirectResponse
    {
        $service->changeSubscribe($request->get('email'), 0);

        return redirect()->route('home');
    }

    /**
     * @param $order_id
     * @param PayService $service
     * @return ApplicationAlias|Factory|View
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
     * @return ApplicationAlias|Factory|View
     */
    public function getAbout()
    {
        return view('pages.about', ['pageTitle' => 'WWT | '.__('messages.contacts')]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendAbout(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);
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

    /**
     * @param Request $request
     * @return ApplicationAlias|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendAdEMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        Mail::to($request->email)->send(new OrderAd($request));

        return response(1);
    }
}
