<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Advert;
use App\Models\Currency;
use App\Models\Referral;
use App\Models\SearchLink;
use App\Models\Status;
use App\Models\TestCallback;
use App\Models\Timezone;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Models\UserLanguage;
use App\Models\UserSettings;
use App\Models\UserTransaction;
use App\Services\PayService;
use App\Services\ProfileService;
use App\Services\SecurityService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @param UserService $user
     * @return Application|Factory|View
     */
    public function settingsIndex(UserService $user)
    {
        $check = $user->getSettings();

        return view('profile_user.pages.settings' , [
            'check' => $check,
        ]);
    }

    /**
     * @param Request $request
     * @param UserService $setSetting
     * @return RedirectResponse
     */
    public function setBasicSettings(Request $request, UserService $setSetting, SubscribeService $subscribeService)
    {
        $setSetting->setSetting($request, $subscribeService);

        return redirect()->back();
    }

    public function editingProfileIndex(ProfileService $service, UserService $userService)
    {
        $percentage = $service->calculate(auth()->user());

        return view('profile_user.pages.editing_profile', [
            'timezones' => Timezone::all(),
            'userLanguages' => $userService->userLanguages(auth()->user()),
            'percentage' => $percentage,
        ]);
    }

    public function editingProfileForm(ProfileRequest $request, ProfileService $form)
    {
        $form->saveFormData($request);
        if($request->avatar) {
            $form->createAvatar($request);
        }

        return redirect()->back();
    }

    public function deleteAvatar(ProfileService $deleted)
    {
        $deleted->deleteAvatar();

        return redirect()->back();
    }

    public function deleteUser(ProfileService $deleted)
    {
        $deleted->deleteUser();

        return redirect()->back();
    }

    public function resetPassword(SecurityService $service)
    {
        $service->resetPassword(auth()->user());

        return redirect()->back();
    }

    public function myAdverts()
    {
        $adverts = Advert::where('user_id', auth()->user()->id)->where('status_id', 1)->orderBy('id', 'desc')->get();
        $statusArchive = Status::where('title', 'archive')->first()->id;

        return view('profile_user.pages.my_adverts', [
            'adverts' => $adverts,
            'statuses' => Status::all(),
            'statusArchive' => $statusArchive,
        ]);
    }

    public function myAdvertsChange(int $status)
    {
        $adverts = Advert::where('user_id', auth()->user()->id)->where('status_id', $status)->orderBy('id', 'desc')->get();
        $statusArchive = Status::where('title', 'archive')->first()->id;
        $data = [
            'output' => view('profile_user.partials.my_advert_div', [
                'adverts' => $adverts,
                'statusArchive' => $statusArchive,
            ])->toHtml(),
        ];



        return response()->json($data);
    }

    public function getFavorite(ProfileService $service)
    {
        if(isset($_COOKIE['status'])) {
            $status = $_COOKIE['status'];
        } else {
            $status = 1;
        }

        return view('profile_user.pages.favorite', [
            'status' => $status,
            'adverts' => auth()->user()->favoriteAdverts,
            'searchLinks' => $service->getSearchLinks(),
        ]);
    }

    public function changeFavorite(int $status, ProfileService $service)
    {

        $data = [
            'output' => view('profile_user.partials.favorite_block', [
                'status' => $status,
                'adverts' => auth()->user()->favoriteAdverts,
                'searchLinks' => $service->getSearchLinks(),
            ])->toHtml(),
        ];

        return response()->json($data);
    }

    public function deleteFavorite(Advert $advert)
    {
        if($favorite = UserFavoriteAdvert::where('advert_id', $advert->id)->where('user_id', auth()->user()->id)->first()) {
            $favorite->delete();
        }

        return redirect()->back();
    }

    public function deleteSearch($search)
    {
        if($search = SearchLink::where('id', $search)->first()) {
            $search->delete();
        }

        return redirect()->back();
    }

    public function referralIndex()
    {
        return \view('profile_user.pages.referral', ['referral_link' => route('home', ['referral_code' => auth()->user()->referral_code])]);
    }

    public function getReferral($referral_code)
    {
        if(User::where('referral_code', $referral_code)->first()){
            Cookie::queue(Cookie::make('referral_code', $referral_code));
        }

        return redirect()->back();
    }

    public function getPayments(PayService $service)
    {
        $service->checkTransaction();

        return \view('profile_user.pages.payments', [
            'score' => $service->getScore(),
            'payments' => UserTransaction::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
            'currency' => Currency::where('title', 'UAH')->first()->title,
        ]);
    }

    public function setTransaction(Request $request, PayService $service)
    {
        return redirect()->route('go_to_liqpay', $service->setTransactionDB($request));
    }

    public function callbackPay(Request $request, PayService $service)
    {
        if ($request->input('data')) abort(200);
        $service->setCallback();
    }

    public function goToLiqPay(PayService $service, $order_id)
    {
        return \view('pages.additing_cost', [
            "pay" => $service->setPay($order_id),
            'currency' => Currency::where('title', 'UAH')->first()->title,
            ]);
    }

}
