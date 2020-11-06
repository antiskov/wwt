<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Timezone;
use App\Services\ProfileService;
use App\Services\SetSettingsService;
use App\Services\UserService;
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
        $check = $user->checkAutoLogin();

        return view('profile_user.pages.settings' , ['check' => $check]);
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

    public function editingProfileIndex()
    {
        return view('profile_user.pages.editing_profile', ['timezones' => Timezone::all()]);
    }

    public function editingProfileForm(ProfileRequest $request, ProfileService $form)
    {
        //dd($request->timezone_id);
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
}
