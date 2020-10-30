<?php


namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileService
{
    public function createAvatar(Request $request)
    {
        $sizes = config('image_sizes.small');
        $userDir = 'images/profiles/'.auth()->user()->email.'/';

        if(auth()->user()->avatar)
        {
            Storage::delete('public/'.$userDir.auth()->user()->avatar);
            Storage::delete('public/'.$userDir.'small_'.auth()->user()->avatar);
        }
        $avatarName = auth()->user()->email . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs($userDir, $avatarName, 'public');
        auth()->user()->avatar = $avatarName;
        auth()->user()->save();

        $avatar        = Storage::path('public/'.$userDir.auth()->user()->avatar);
        $avatar_small = Image::make($avatar);
        $avatar_small->resize($sizes['width'], $sizes['height']);
        $small_url_avatar = 'public/'.$userDir.'small_'.auth()->user()->avatar;
        $avatar_small->save(Storage::path($small_url_avatar));

        return $avatarName;
    }

    public function deleteAvatar() {
        $userDir = 'images/profiles/'.auth()->user()->email.'/';

        if(auth()->user()->avatar)
        {
            Storage::delete('public/'.$userDir.auth()->user()->avatar);
            Storage::delete('public/'.$userDir.'small_'.auth()->user()->avatar);

            auth()->user()->avatar = 'person.png';
            auth()->user()->save();
        }
    }
}
