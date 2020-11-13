<?php

namespace Database\Seeders;

use App\Models\BraceletClasp;
use Illuminate\Database\Seeder;

class BraceletClaspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasps = [
            'Раскладная',
            'Застежка-шип',
            'Двойной сложности застежка',
        ];

        foreach ($clasps as $clasp) {
            BraceletClasp::create(['title' => $clasp]);
        }
    }
}
