<?php

namespace Database\Seeders;

use App\Models\WatchFigure;
use Illuminate\Database\Seeder;

class WatchFigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $figures = [
            'Арабские',
            "Римские",
            "Без цыфр",
        ];

        foreach ($figures as $figure) {
            WatchFigure::create(['title' => $figure]);
        }
    }
}
