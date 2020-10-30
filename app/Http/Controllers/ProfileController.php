<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\UserSettings;
use App\Services\SetSettingsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function setBasicSettings(ProfileRequest $request) {
        $setSetting = new SetSettingsService();
        $setSetting->setSetting($request);

        return redirect()->back();
    }
}
