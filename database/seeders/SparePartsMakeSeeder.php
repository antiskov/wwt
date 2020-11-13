<?php

namespace Database\Seeders;

use App\Models\SparePartsMake;
use Illuminate\Database\Seeder;

class SparePartsMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makes = [
            'Rolex',
            'Casio',
            'iWatch',
            'Patek Philippe',
            'Omega',
            'IWC Schaffhausen',
            'Rolex',
            'Casio',
            'iWatch',
            'Patek Philippe',
            'Omega',
            'IWC Schaffhausen',
        ];

        foreach ($makes as $make) {
            SparePartsMake::create(['title' => $make]);
        }
    }
}
