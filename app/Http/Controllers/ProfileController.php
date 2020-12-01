<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Advert;
use App\Models\Referral;
use App\Models\SearchLink;
use App\Models\Timezone;
use App\Models\User;
use App\Models\UserFavoriteAdvert;
use App\Models\UserLanguage;
use App\Models\UserSettings;
use App\Services\ProfileService;
use App\Services\SecurityService;
use App\Services\SubscribeService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @param UserService $user
     * @return Application|Factory|View
     */
    public function settingsIndex(UserService $user)
    {
        $check = $user->check();

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
        $adverts = Advert::where('user_id', auth()->user()->id)->where('status_id', 1)->get();
        return view('profile_user.pages.my_adverts', ['adverts' => $adverts]);
    }

    public function myAdvertsChange(int $status)
    {
        $data = [
            'output' => view('profile_user.partials.my_advert_div', ['adverts' => Advert::where('user_id', auth()->user()->id)->where('status_id', $status)->get()])->toHtml(),
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

}
