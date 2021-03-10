<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageMinificationService
{
    /**
     * @param string $image_url
     * @param array $image_sizes
     * @param string $path
     */
    public function minify(string $image_url, array $image_sizes, $path = '')
    {
        $sizes = config('image_sizes');

        $image        = Storage::path($path.'/'.$image_url);
        $original_image_sizes = getimagesize($image);
        $image_resize = Image::make($image);

        $images_resized = ['original' => $image_url];

        foreach ($image_sizes as $size) {
            $partials_url            = explode('/', $image_url);
            $last_key                = array_key_last($partials_url);
            $partials_url[$last_key] = $size . '_' . end($partials_url);
            $save_path               = Storage::path($path.'/'.implode('/', $partials_url));
            $width = $original_image_sizes[0]*$sizes[$size]['width'];
            $height = $original_image_sizes[1]*$sizes[$size]['height'];
            $image_resize->resize($width, $height);
            $image_resize->save($save_path);
            $images_resized[$size]   = $save_path;
        }
    }
}
