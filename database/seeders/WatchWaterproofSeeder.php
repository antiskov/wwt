<?php

namespace Database\Seeders;

use App\Models\WatchWaterproof;
use Illuminate\Database\Seeder;

class WatchWaterproofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waterproofs = [
            10,
            5,
            5,
        ];

        foreach ($waterproofs as $waterproof) {
            WatchWaterproof::create(['title' => $waterproof]);
        }
    }
}
