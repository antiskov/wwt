<?php


namespace App\Services;

use App\Http\Requests\ProfileRequest;
use App\Models\Timezone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $original_image_sizes = getimagesize($avatar);
        $avatar_small = Image::make($avatar);
        $width = $original_image_sizes[0]*$sizes['width'];
        $height = $original_image_sizes[1]*$sizes['height'];
        $avatar_small->resize($width, $height);
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
        if (!User::where('email', $request->email)->first()){
            $user->email = $request->email;
        }
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

        $languages = ['1' => 'Украинский','Русский', 'English'];
        $numberLanguages = [0];
        unset($numberLanguages[0]);

        if($request->lang){
            foreach ($request->lang as $lang) {
                $numberLanguages[] = array_search($lang, $languages);
            }
        }

        $user->languages()->sync($numberLanguages);

    }

    public function deleteUser()
    {
        auth()->user()->delete();
    }

    public function calculate(User $profile)
    {
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;

        foreach ($profile->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
                $total += $per_column;
            }
        }

        return round($total);
    }

    public function getSearchLinks()
    {
        $searchLinks = [];

        foreach (auth()->user()->searchLinks as $link) {
            $searchLinks[$link->id]['title'] = $link->title;
            $searchLinks[$link->id]['link'] = $link->link_search;
            $searchLinks[$link->id]['id'] = $link->id;
            $searchLinks[$link->id]['created_at'] = $link->created_at;
        }

        return $searchLinks;
    }

    public function getAvatar($userId)
    {
        $user = User::find($userId);

        if ($user->avatar) {
            return '/storage/images/profiles/'.$user->email.'/small_'.$user->avatar;
        } else {
            return '/images/icons/wwt_profile_avatar.png';
        }
    }
}
