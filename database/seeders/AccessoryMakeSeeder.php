<?php

namespace Database\Seeders;

use App\Models\AccessoryMake;
use Illuminate\Database\Seeder;

class AccessoryMakeSeeder extends Seeder
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
            AccessoryMake::create(['title' => $make]);
        }
    }
}
