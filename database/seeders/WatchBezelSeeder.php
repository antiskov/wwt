<?php

namespace Database\Seeders;

use App\Models\WatchBezel;
use Illuminate\Database\Seeder;

class WatchBezelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bezels = [
            'Алюминий',
            'Железо',
            "Золото"
        ];

        foreach ($bezels as $bezel) {
            WatchBezel::create([ 'title' => $bezel]);
        }
    }
}
