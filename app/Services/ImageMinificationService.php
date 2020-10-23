<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageMinificationService
{
    public function minify($image_url, $image_size)
    {
        $sizes = config('image_sizes');
        $small_width    = $sizes['small']['width'];
        $small_height   = $sizes['small']['height'];
        $medium_width      = $sizes['medium']['width'];
        $medium_height     = $sizes['medium']['height'];
        $big_width      = $sizes['big']['width'];
        $big_height     = $sizes['big']['height'];


        $image              = Storage::path($image_url);
        $image_resize_small = Image::make($image);
        $image_resize_big   = Image::make($image);

        if($image_size === 'small'){
            $image_resize_small->resize($small_width, $small_height);
            $image_resize_small->save(Storage::path('public/yoda_small.png'));
        }

        if($image_size === 'medium'){
            $image_resize_small->resize($medium_width, $medium_height);
            $image_resize_small->save(Storage::path('public/yoda_medium.png'));
        }

        if($image_size === 'big'){
            $image_resize_big->resize($big_width, $big_height);
            $image_resize_big->save(Storage::path('public/yoda_big.png'));
        }
    }
}
