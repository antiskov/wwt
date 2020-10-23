<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageMinificationService
{
    public function minify(string $image_url, array $image_sizes)
    {
        $sizes = config('image_sizes');

        $image        = Storage::path($image_url);
        $image_resize = Image::make($image);

        $images_resized = ['original' => $image_url];

        foreach ($image_sizes as $size) {
            $partials_url            = explode('/', $image_url);
            $last_key                = array_key_last($partials_url);
            $partials_url[$last_key] = $size . '_' . end($partials_url);
            $save_path               = Storage::path(implode('/', $partials_url));
            $image_resize->resize($sizes[$size]['width'], $sizes[$size]['height']);
            $image_resize->save($save_path);
            $images_resized          = [$size => $save_path];
        }
        return $images_resized;
    }
}
