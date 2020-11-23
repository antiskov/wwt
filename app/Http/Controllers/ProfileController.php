<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Advert;
use App\Models\SearchLink;
use App\Models\Timezone;
use App\Models\UserFavoriteAdvert;
use App\Models\UserLanguage;
use App\Models\UserSettings;
use App\Services\ProfileService;
use App\Services\SecurityService;
use App\Services\UserService;
use http\Client\Curl\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
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
    public function setBasicSettings(Request $request, UserService $setSetting)
    {
        $setSetting->setSetting($request);

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

    public function myAdverts(Request $request)
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

    public function getFavorite()
    {
//        dd(auth()->user()->favoriteAdverts, UserFavoriteAdvert::all());
        return view('profile_user.pages.favorite', [
            'status' => 1,
            'adverts' => auth()->user()->favoriteAdverts,
        ]);
    }

    public function changeFavorite(int $status)
    {
        $searchLinks = [];
        foreach (auth()->user()->searchLinks as $link) {
            $searchLinks[$link->id]['title'] = $link->title;
            $searchLinks[$link->id]['link'] = $link->link_search;
            $searchLinks[$link->id]['id'] = $link->id;
        }

        $data = [
            'output' => view('profile_user.partials.favorite_block', [
                'status' => $status,
                'adverts' => auth()->user()->favoriteAdverts,
                'searchLinks' => $searchLinks,
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

//    public function deleteSearch($title, $link)
    public function deleteSearch($search)
    {
        if($search = SearchLink::where('id', $search)->first()) {
            $search->delete();
        }

        return redirect()->back();
    }



}
