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
        WatchMaterial::create(['title' => 'iron']);
        BraceletMaterial::create(['title' => 'skin']);
        Glass::create(['title' => 'sapphire']);
        $diameters = [
            '44.2',
            '45.2',
            '39.8',
        ];
        foreach ($diameters as $diameter) {
            DiameterWatch::create([
                'height' => $diameter,
            ]);
        }

        for($i = 1; $i <= 12; $i++) {
            WatchAdvert::create([
                'advert_id' => $i,
                'watch_type_id' => 1,
                'watch_make_id' => 1,
                'watch_model_id' => 1,
//                'watch_state' => 'new',
                'model_code' => 471-874-9,
                'sex_id' => 1,
                'release_year' => 2000,
                'is_release_year_confirmed' => 1,
                'height' => 100,
                'width' => 40,
                'mechanism_type_id' => 1,
                'watch_material_id' => 1,
                'bracelet_material_id' => 1,
                'glass_id' => 1,
                'diameter_watch_id' => 1,
                'year_advert_id' => 1,
                'state_id' => 2,
                'watch_dial_id' => 2,
            ]);
        }
    }
}
