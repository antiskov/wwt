<?php

namespace Database\Seeders;

use App\Models\WidthClasp;
use Illuminate\Database\Seeder;

class WidthClaspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $widthClasps = [
            20,
            19,
            22,
        ];

        foreach ($widthClasps as $widthClasp) {
            WidthClasp::create(['title' => $widthClasp]);
        }
    }
}
