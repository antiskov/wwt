<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use App\Services\SetSettingsService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function settingsIndex() {

        return view('profile_user.pages.settings');
    }

    /**
     * @param Request $request
     * @param UserService $setSetting
     * @return RedirectResponse
     */
    public function setBasicSettings(Request $request, UserService $setSetting) {
        $setSetting->setSetting($request);

        return redirect()->back();
    }

    public function editingProfileIndex() {
        return view('profile_user.pages.editing_profile');
    }

    public function editingProfileForm(ProfileRequest $request, ProfileService $form) {
        $form->createAvatar($request);
        $form->saveFormData($request);

        return redirect()->back();
    }

    public function deleteAvatar (ProfileService $deleted) {
        $deleted->deleteAvatar();

        return redirect()->back();
    }
}
