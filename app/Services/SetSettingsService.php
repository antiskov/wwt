<?php


namespace App\Services;

use App\Models\UserSettings;
use Illuminate\Http\Request;

class SetSettingsService
{
    /**
     * @param Request $request
     * @return UserSettings
     */
    public function setSetting(Request $request)
    {
        if($setting = UserSettings::where('user_id', '=',auth()->user()->id)->first()) {
            $setting->update([
                'receive_service_info' => $request->receive_service_info,
                'receive_partners_adverts' => $request->receive_partners_adverts,
                'stay_logged_in' => $request->stay_logged_in,
                'language_communication' => $request->language_communication,
            ]);
        } else {
            $setting = new UserSettings($request->all());
            $setting->user()->associate(auth()->user());
            $setting->save();
        }

        return $setting;
    }
}
