<?php

namespace App\Http\Controllers;

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

        return view('profile.pages.settings');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setBasicSettings(Request $request) {
        $setSetting = new SetSettingsService();
        $setSetting->setSetting($request);

        return redirect()->back();
    }
}
