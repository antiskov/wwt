<?php

namespace App\Services;

use App\Domain\Uploader;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderService
{
    public function uploadSlider(Request $request)
    {
        $service = new Uploader();
        $service->uploadImage($request, 'image', 'admin/sliders');

        $this->createSlider($request, $service->getFilename());
    }

    public function createSlider(Request $request, $image)
    {
        $slider = new HomeSlider();
        $slider->image = $image;
        $slider->upper_text = $request->upper_text;
        $slider->middle_text = $request->middle_text;
        $slider->link = $request->link;
        $slider->is_active = 1;

        if (!$slider->save()) {
            Log::info("Slider #$slider->id not checked");
        }
    }
}
