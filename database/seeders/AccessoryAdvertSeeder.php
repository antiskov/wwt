<?php

namespace Database\Seeders;

use App\Models\AccessoryAdvert;
use App\Models\WatchAdvert;
use Illuminate\Database\Seeder;

class AccessoryAdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {

            AccessoryAdvert::create([
                'advert_id' => $i,
                'accessory_make_id' => $i,
                'accessory_model_id' => $i,
                'accessory_state' => 'new',
                'sex_id' => 1,
                'is_release_year_confirmed' => 1,
                'model_code' => '000'.$i,
                'height' => '2'.$i,
                'release_year' => '199'.$i,
                'width' => '100'.$i,
                'accessory_mechanism_type_id' => $i,
            ]);
        }
    }
}
