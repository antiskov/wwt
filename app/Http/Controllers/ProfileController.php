<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use App\Services\SetSettingsService;
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
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public function setBasicSettings(Request $request) {
        $setSetting = new SetSettingsService();
        $setSetting->setSetting($request);

        return redirect()->back();
    }

    public function editingProfileIndex() {
        return view('profile_user.pages.editing_profile');
    }

    public function editingProfileForm(ProfileRequest $request) {
        //dd($request);
        $form = new ProfileService();
        $form->createAvatar($request);
        $form->saveFormData($request);

        return redirect()->back();
    }

    public function deleteAvatar () {
        $deleted = new ProfileService();
        $deleted->deleteAvatar();

        return redirect()->back();
    }
}
