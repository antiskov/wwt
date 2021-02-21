<?php

namespace App\Widgets;

use App\Models\Banner;
use Arrilot\Widgets\AbstractWidget;

class AdBanner extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'is_active' => 1,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $banner = Banner::where('is_active', 1)->first();

        if($banner && (date('Y-m-d') <= $banner->date_finish)){
            return view('widgets.ad_banner', [
                'config' => $this->config,
                'banner' => $banner,
            ]);
        } else {
            return view('widgets.none');
        }
    }
}
