<?php


namespace App\Services;

use App\Models\User;
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
//        if(!$request->email) {
//            $user->email = $request->email;
//        }
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
    }

    public function deleteUser()
    {
        auth()->user()->delete();
    }
}
