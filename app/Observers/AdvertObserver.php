<?php

namespace App\Observers;

use App\Models\Advert;

class AdvertObserver
{
    /**
     * Handle the advert "created" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function created(Advert $advert)
    {
        //
    }

    /**
     * Handle the advert "updated" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function updated(Advert $advert)
    {
        //
    }

    /**
     * Handle the advert "deleted" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function deleted(Advert $advert)
    {
        //
    }

    /**
     * Handle the advert "restored" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function restored(Advert $advert)
    {
        //
    }

    /**
     * Handle the advert "force deleted" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function forceDeleted(Advert $advert)
    {
        //
    }
}
