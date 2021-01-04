<?php

namespace App\Services;

use App\Domain\Uploader;
use App\Http\Requests\MakerRequest;
use App\Models\WatchMake;
use Illuminate\Support\Facades\Log;

class WatchMakerService
{
    /**
     * @param MakerRequest $request
     */
    public function createMaker(MakerRequest $request)
    {
        $service = new Uploader();
        $service->uploadImageForFormRequest($request, 'logo', 'admin/makers');

        $maker = new WatchMake();
        $maker->title = $request->title;
        $maker->logo = $service->getFilename();
        $maker->status = 0;
        $maker->is_moderated = 1;

        if (!$maker->save()) {
            Log::info("Maker #$maker->id not checked");
        }
    }
}
