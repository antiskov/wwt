<?php

namespace App\Services;

use App\Models\Advert;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ModerationService
{
    /**
     * @param Advert $advert
     */
    public function publishedWatchMake(Advert $advert)
    {
        $watchMake = $advert->watchAdvert->watchMake;
        $watchMake->is_moderated = 1;

        if (!$watchMake->save()) {
            Log::info("WatchMake #$watchMake->id not saved");
        }
    }

    /**
     * @param Status $status
     * @param Advert $advert
     */
    public function changeStatus(Status $status, Advert $advert)
    {
        $advert->status_id = $status->id;
        if (!$advert->save()) {
            Log::info("Advert #$advert->id not saved");
        }

        if ($status->title == 'published') {
            $advert->finish_date_active_status = Carbon::now()->addMonth(2);

            if ($advert->vip_status == 1 && !$advert->finish_date_vip){
                $advert->finish_date_vip = Carbon::now()->addMonth(1);
            }

            if (!$advert->save()) {
                Log::info("Advert #$advert->id not saved");
            }
        }
    }
}
