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
        $states = ['new', 'userd'];
        for($i = 11; $i < 35; $i++) {
            WatchAdvert::create([
                'advert_id' => $i,
                'watch_type_id' => 1,
                'watch_make_id' => 1,
                'watch_model_id' => rand(1,9),
                'model_code' => 4717,
                'sex_id' => rand(1,2),
                'release_year' => '200'.$i,
                'is_release_year_confirmed' => 1,
                'height' => rand(10,20),
                'width' => rand(1,9),
                'watch_state' => $states[rand(0,1)],
                'mechanism_type_id' => 1,
            ]);
        }
    }
}
