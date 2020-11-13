<?php

namespace Database\Seeders;

use App\Models\BasicImageAdvert;
use App\Models\BraceletMaterial;
use App\Models\DiameterWatch;
use App\Models\Glass;
use App\Models\WatchAdvert;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
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
        for($i = 1; $i <= 12; $i++) {
            WatchAdvert::create([
                'advert_id' => $i,
                'watch_type_id' => 1,
                'watch_make_id' => 1,
                'watch_model_id' => 1,
                'model_code' => 4717,
                'sex_id' => 1,
                'release_year' => '200'.$i,
                'is_release_year_confirmed' => 1,
                'height' => 100,
                'width' => 40,
            ]);
        }
    }
}
