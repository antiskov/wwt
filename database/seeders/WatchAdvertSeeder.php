<?php

namespace Database\Seeders;

use App\Models\WatchAdvert;
use App\Models\WatchMake;
use App\Models\WatchType;
use Illuminate\Database\Seeder;

class WatchAdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        WatchAdvert::create([
            'advert_id' => 1,
            'watch_type_id' => 1,
            'watch_make_id' => 1,
            'watch_model_id' => 1,
            'watch_state' => 'new',
            'model_code' => 471-874-9,
            'sex_id' => 1,
            'release_year' => 2000,
            'is_release_year_confirmed' => 1,
            'height' => 100,
            'width' => 40,
            'mechanism_type_id' => 1,
        ]);
    }
}
