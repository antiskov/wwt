<?php

namespace App\Console\Commands;

use App\Models\AdvertPhoto;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearAdvertPhoto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advert_photos:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all photos of adverts.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now();
        $advertPhotos = AdvertPhoto::where('deleted_at', '!=', null)->get();

        if ($advertPhotos){
            foreach ($advertPhotos as $advertPhoto) {
                if ($date->diffInMonths($advertPhoto->deleted_at) > 0){
                    Storage::delete('/public/images/advert_photos/watch/number_' . $advertPhoto->advert->id . '/' . $advertPhoto->photo);
                }
            }
        }
    }
}
