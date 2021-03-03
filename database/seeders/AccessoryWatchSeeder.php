<?php

namespace Database\Seeders;

use App\Models\AccessoryWatch;
use Illuminate\Database\Seeder;

class AccessoryWatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            AccessoryWatch::create([
                'accessory_advert_id' => $i,
                'watch_model_id' => 1,
            ]);
        }
    }
}
