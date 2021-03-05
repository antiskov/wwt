<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Advert;
use App\Models\Currency;
use App\Models\SearchLink;
use App\Models\Status;
use App\Models\Timezone;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Models\UserTransaction;
use App\Services\FixStatusAdvert;
use App\Services\PayService;
use App\Services\ProfileService;
use App\Services\SecurityService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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

        return view('profile_user.pages.settings', [
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


    /**
     * @param ProfileService $service
     * @param UserService $userService
     * @param ProfileService $profileService
     * @return Application|Factory|View
     */
    public function editingProfileIndex(ProfileService $service, UserService $userService)
    {
        $percentage = $service->calculate(auth()->user());

        return view('profile_user.pages.editing_profile', [
            'timezones' => Timezone::all(),
            'userLanguages' => $userService->userLanguages(auth()->user()),
            'percentage' => $percentage,
            'avatarPath' => $service->getAvatar(auth()->user()->id),
        ]);
    }

    /**
     * @param ProfileRequest $request
     * @param ProfileService $form
     * @return RedirectResponse
     */
    public function editingProfileForm(ProfileRequest $request, ProfileService $form)
    {
        if ($request->phone){
            $validArr['phone'] = 'numeric';
        }

        if ($request->zip_code){
            $validArr['zip_code'] = 'numeric';
        }
        if (isset($validArr)){
            $validator = Validator::make($request->all(), $validArr);
            if ($validator->fails()){
                return redirect()->back();
            }
        }

        $form->saveFormData($request);
        if ($request->avatar) {
            $form->createAvatar($request);
        }

        return redirect()->back();
    }

    /**
     * @param ProfileService $deleted
     * @return RedirectResponse
     */
    public function deleteAvatar(ProfileService $deleted)
    {
        $deleted->deleteAvatar();

        return redirect()->back();
    }

    /**
     * @param ProfileService $deleted
     * @return RedirectResponse
     */
    public function deleteUser(ProfileService $deleted)
    {
        $deleted->deleteUser();

        return redirect()->back();
    }

    /**
     * @param SecurityService $service
     * @return RedirectResponse
     */
    public function resetPassword(SecurityService $service)
    {
        $service->resetPassword(auth()->user());

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function myAdverts()
    {
        FixStatusAdvert::fix();
        if (!Session::exists('advertStatus')){
            Session::put('advertStatus', 1);
        }

        $adverts = $this->getAdverts(Session::get('advertStatus'));

        return view('profile_user.pages.my_adverts', [
            'adverts' => $adverts,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * @param $status
     * @return mixed
     */
    private function getAdverts($status)
    {
        return Advert::where('user_id', auth()->user()->id)
            ->where('status_id', $status)
            ->orderBy('id', 'desc')
            ->paginate(50);
    }

    /**
     * @param int $status
     * @return RedirectResponse
     */
    public function myAdvertsChange(int $status)
    {
        Session::put('advertStatus', $status);

        return redirect()->action([ProfileController::class, 'myAdverts']);
    }

    /**
     * @param ProfileService $service
     * @return Application|Factory|View
     */
    public function getFavorite(ProfileService $service)
    {
        if (isset($_COOKIE['status'])) {
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

    /**
     * @param int $status
     * @param ProfileService $service
     * @return JsonResponse
     */
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

    /**
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function deleteFavorite(Advert $advert)
    {
        if ($favorite = UserFavoriteAdvert::where('advert_id', $advert->id)->where('user_id', auth()->user()->id)->first()) {
            $favorite->delete();
        }

        return redirect()->back();
    }

    /**
     * @param $search
     * @return RedirectResponse
     */
    public function deleteSearch($search)
    {
        if ($search = SearchLink::where('id', $search)->first()) {
            $search->delete();
        }

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function referralIndex()
    {
        return \view('profile_user.pages.referral', ['referral_link' => route('home', ['referral_code' => auth()->user()->referral_code])]);
    }

    /**
     * @param $referral_code
     * @return RedirectResponse
     */
    public function getReferral($referral_code)
    {
        if (User::where('referral_code', $referral_code)->first()) {
            Cookie::queue(Cookie::make('referral_code', $referral_code));
        }

        return redirect()->back();
    }

    /**
     * @param PayService $service
     * @return Application|Factory|View
     */
    public function getPayments(PayService $service)
    {
        $service->checkTransaction();

        return \view('profile_user.pages.payments', [
            'score' => $service->getScore(),
            'payments' => UserTransaction::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
            'currency' => Currency::where('title', 'UAH')->first()->title,
        ]);
    }

    /**
     * @param Request $request
     * @param PayService $service
     * @return RedirectResponse
     */
    public function setTransaction(Request $request, PayService $service)
    {
        return redirect()->route('go_to_liqpay', $service->setTransactionDB($request));
    }

    /**
     * @param Request $request
     * @param PayService $service
     */
    public function callbackPay(Request $request, PayService $service)
    {
        if ($request->input('data')) abort(200);
        $service->setCallback();
    }

    /**
     * @param PayService $service
     * @param $order_id
     * @return Application|Factory|View
     */
    public function goToLiqPay(PayService $service, $order_id)
    {
        return \view('pages.additing_cost', [
            "pay" => $service->setPay($order_id),
            'currency' => Currency::where('title', 'UAH')->first()->title,
        ]);
    }

    public function uploadAvatar(Request $request, ProfileService $service)
    {
        $validArr['avatar'] = 'mimes:jpeg,png,jpg,svg|max:10485';
        $validator = Validator::make($request->all(), $validArr);
        if ($validator->fails()){
            return redirect()->back();
        }
        $service->createAvatar($request);

        $data = [
            'output' => \Illuminate\Support\Facades\View::make('profile_user.partials.avatar', [
                'avatarPath' => $service->getAvatar(auth()->user()->id),
            ])->toHtml(),
        ];

        return Response::json($data);
    }

}
