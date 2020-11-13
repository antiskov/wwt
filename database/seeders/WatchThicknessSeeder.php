<?php

namespace Database\Seeders;

use App\Models\WatchThickness;
use Illuminate\Database\Seeder;

class WatchThicknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thicknesses = [
            12,
            15,
            17,
            19,
        ];

        foreach ($thicknesses as $thickness) {
            WatchThickness::create(['title' => $thickness]);
        }
    }
}
