<?php

namespace Database\Seeders;

use App\Models\WatchDial;
use Illuminate\Database\Seeder;

class WatchDialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dials = [
            'красный',
            'желтый',
            'черный',
        ];

        foreach ($dials as $dial) {
            WatchDial::create(['title' => $dial]);
        }
    }
}
