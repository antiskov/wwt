<?php

namespace Database\Seeders;

use App\Models\BraceletColor;
use Illuminate\Database\Seeder;

class BraceletColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            "Сталь",
            "Коричневый",
            "Чорный",
        ];

        foreach ($colors as $color) {
            BraceletColor::create(['title' => $color]);
        }
    }
}
