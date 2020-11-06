<?php


namespace App\Services;

use App\Models\Language;
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
//        dd($request);
        $user = auth()->user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->surname;
        if($request->sex == 'Женский') {
            $user->sex = 'woman';
        } else {
            $user->sex = 'man';
        }
        $user->birthday_date = $request->birthday_date;
        $user->country = $request->country;
        $user->region = $request->region;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->zip_code = $request->zip_code;
        $user->specialisation = $request->specialisation;
        $user->description = $request->description;
        $user->save();


        foreach ($request->lang as $lang) {
            if($lang == 'Украинский') {
                $lang = 'ua';
            } elseif ($lang == 'English') {
                $lang = 'en';
            } else {
                $lang = 'ru';
            }

            $language = Language::where('code', $lang)->first();
            $userLand = new UserLanguage();
//            if($userLandOld = UserLanguage::where('user_id', $user->id)) {
//                $user
//            }
//            $userLand->users()->sync($user);
//            $userLand->languages()->sync($language);
            $userLand->save();
        }

    }

    public function deleteUser()
    {
        auth()->user()->delete();
    }
}
