<?php

namespace App\Widgets;

use App\Models\WatchMake;
use Arrilot\Widgets\AbstractWidget;

class Makers extends AbstractWidget
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

        return view('widgets.makers', [
            'config' => $this->config,
            'makers' => WatchMake::where('status', 1)->get(),
        ]);
    }
}
