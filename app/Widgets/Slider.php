<?php

namespace App\Widgets;

use App\Models\HomeSlider;
use Arrilot\Widgets\AbstractWidget;

class Slider extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        if(HomeSlider::where('is_active', 1)->get()) {
            return view('widgets.slider', [
                'config' => $this->config,
                'sliders' => HomeSlider::where('is_active', 1)->get(),
            ]);
        } else {
            return view('widgets.slider', [
                'config' => $this->config,
            ]);
        }

    }
}
