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
use App\Models\LimitNotVipAdvert;
use App\Models\MaterialsClasp;
use App\Models\MechanismType;
use App\Models\Option;
use App\Models\Price;
use App\Models\Province;
use App\Models\Sex;
use App\Models\SparePartsMake;
use App\Models\State;
use App\Models\UserCountAdvert;
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
use App\Services\PayService;
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
        $viewArr['config'] = $this->config;
        $viewArr['adverts'] = Advert::where('type', 'watch')->get();
        $viewArr['brands'] = WatchMake::where('status', 1)->get();

        if (\Auth::check()){
            $userCountAdvert = UserCountAdvert::where('user_id', auth()->user()->id)->first();
            $limit = LimitNotVipAdvert::first()->value;
            $viewArr['userCountAdvert'] = $userCountAdvert;
            $viewArr['limit'] = $limit;

            $payService = new PayService();
            $price = Price::where('title', 'notVip')->first()->value;
            if ($payService->getScore() > $price){
                $viewArr['rule_price'] = 1;
            } else {
                $viewArr['rule_price'] = 0;
            }
        }

        return view('widgets.header_menu', $viewArr);
    }
}
