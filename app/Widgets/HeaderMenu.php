<?php

namespace App\Widgets;

use App\Models\AccessoryMake;
use App\Models\Advert;
use App\Models\BraceletClasp;
use App\Models\BraceletColor;
use App\Models\BraceletMaterial;
use App\Models\Category;
use App\Models\DeliveryVolume;
use App\Models\DiameterWatch;
use App\Models\Glass;
use App\Models\MaterialsClasp;
use App\Models\MechanismType;
use App\Models\Option;
use App\Models\Province;
use App\Models\Sex;
use App\Models\SparePartsMake;
use App\Models\State;
use App\Models\WatchAdvert;
use App\Models\WatchBezel;
use App\Models\WatchDial;
use App\Models\WatchFigure;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
use App\Models\WatchModel;
use App\Models\WatchThickness;
use App\Models\WatchType;
use App\Models\WatchWaterproof;
use App\Models\WidthClasp;
use App\Models\YearAdvert;
use Arrilot\Widgets\AbstractWidget;

class HeaderMenu extends AbstractWidget
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
        //

        return view('widgets.header_menu', [
            'config' => $this->config,
            'adverts' => Advert::where('type', 'watch')->get(),
            'brands' => WatchMake::where('status', 1)->get(),
        ]);
    }
}
