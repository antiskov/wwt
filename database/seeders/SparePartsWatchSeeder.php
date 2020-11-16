<?php

namespace Database\Seeders;

use App\Models\SparePartsWatch;
use Illuminate\Database\Seeder;

class SparePartsWatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            SparePartsWatch::create([
                'spare_parts_advert_id' => $i,
                'watch_model_id' => 1,
            ]);
        }
    }
}
