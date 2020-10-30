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

        if(auth()->user()->avatar)
        {
            Storage::delete('/public/images/' . auth()->user()->avatar);
        }
        $filename = auth()->user()->email . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $filename, 'public');
        auth()->user()->avatar = $filename;
        auth()->user()->save();

        $image        = Storage::path('public/images/' . auth()->user()->avatar);
        $image_resize = Image::make($image);
        $image_resize->resize($sizes['width'], $sizes['height']);
        $small_url_image = 'public/images/small_'.auth()->user()->avatar;
        $image_resize->save(Storage::path($small_url_image));

        return $small_url_image;
    }
}
