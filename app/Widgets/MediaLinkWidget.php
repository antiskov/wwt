<?php

namespace App\Widgets;

use App\Models\MediaLink;
use Arrilot\Widgets\AbstractWidget;

class MediaLinkWidget extends AbstractWidget
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
        $meds = clone $medias;
        $mediaLinks = $meds->where('type', 'icon')->get();
        $meds = clone $medias;
        $mediaImages = $meds->where('type', 'image')->get();


        return view('widgets.media_link_widget', [
            'config' => $this->config,
            'mediaLinks' => $mediaLinks,
            'mediaImages' => $mediaImages
        ]);
    }
}
