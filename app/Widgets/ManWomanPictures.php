<?php

namespace App\Widgets;

use App\Models\ManWomanPicture;
use Arrilot\Widgets\AbstractWidget;

class ManWomanPictures extends AbstractWidget
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
        if($picture = ManWomanPicture::latest()->first()){
            return view('widgets.man_woman_pictures', [
                'config' => $this->config,
                'man' => "/storage/admin/man_woman_pictures/$picture->man",
                'woman' => "/storage/admin/man_woman_pictures/$picture->woman",
            ]);
        } else {
            return view('widgets.man_woman_pictures', [
                'config' => $this->config,
                'man' => "",
                'woman' => "",
            ]);
        }


    }
}
