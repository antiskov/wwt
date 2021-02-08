<?php

namespace App\Widgets;

use App\Models\MediaLink;
use Arrilot\Widgets\AbstractWidget;

class MobMediaIcons extends AbstractWidget
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
        $medias = MediaLink::where('is_active', 1);
        $mediaLinks = $medias->where('type', 'icon')->get();

        return view('widgets.mob_media_icons', [
            'config' => $this->config,
            'mediaLinks' => $mediaLinks,
        ]);
    }
}
