<?php


namespace App\Services;

use App\Models\Language;
use App\Models\Timezone;
use App\Models\User;
use App\Models\UserLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileService
{
    public function createAvatar(Request $request)
    {
        $sizes = config('image_sizes.small');
        $user = auth()->user();
        $userDir = 'images/profiles/'.$user->email.'/';

        if($user->avatar)
        {
            Storage::delete('public/'.$userDir.$user->avatar);
            Storage::delete('public/'.$userDir.'small_'.$user->avatar);
        }
        $avatarName = $user->email . '_' . $request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->storeAs($userDir, $avatarName, 'public');
        $user->avatar = $avatarName;
        $user->save();

        $avatar        = Storage::path('public/'.$userDir.$user->avatar);
        $avatar_small = Image::make($avatar);
        $avatar_small->resize($sizes['width'], $sizes['height']);
        $avatar_small_name = 'small_'.$user->avatar;
        $small_url_avatar = 'public/'.$userDir.$avatar_small_name;
        $avatar_small->save(Storage::path($small_url_avatar));

        return $avatar_small_name;
    }

    public function deleteAvatar()
    {
        $user = auth()->user();
        $userDir = 'images/profiles/'.$user->email.'/';

        if($user->avatar)
        {
            Storage::delete('public/'.$userDir.$user->avatar);
            Storage::delete('public/'.$userDir.'small_'.$user->avatar);

            $user->avatar = 'person.png';
            $user->save();
        }
    }

    public function saveFormData(Request $request)
    {
        $user = auth()->user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->surname;
        if($request->sex == 'Женский') {
            $user->sex = 'woman';
        } else {
            $user->sex = 'man';
        }
        $timezone = explode(' ', $request->timezone_id);
        $last_key = array_key_last($timezone);
        $zoneTime = Timezone::where('time_difference', $timezone[$last_key])->first();
        $user->timezone()->associate($zoneTime);
        $user->birthday_date = $request->birthday_date;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->region = $request->region;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->zip_code = $request->zip_code;
        $user->specialisation = $request->specialisation;
        $user->description = $request->description;
        $user->street_addition = $request->street_addition;
        $user->save();

        $languages = ['1' => 'Украинский','English', 'Русский'];
        $numberLanguages = [0];
        unset($numberLanguages[0]);
        foreach ($request->lang as $lang) {
            $numberLanguages[] = array_search($lang, $languages);
        }

        $user->languages()->sync($numberLanguages);

    }

    public function deleteUser()
    {
        auth()->user()->delete();
    }
}
