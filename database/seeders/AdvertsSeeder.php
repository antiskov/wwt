<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Role;
use App\Models\User;
use App\Models\YearAdvert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdvertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1990; $i <= 2020; $i++) {
            YearAdvert::create(['number' => $i]);
        }

        $watches = [
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

        foreach ($watches as $watch) {
            Advert::create(
                [
                    'type' => 'watch',
                    'user_id' => 1,
                    'title' => $watch,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'price' => 100,
                    'currency_id' => 1,
                    'status_id' => 1,
                    'surname' => 'Iskov',
                    'name' => 'Anton',
                    //'birthday' => '05.01.1999',
                    'phone' => '0980000000',
                    'country' => 'Ukraine',
                    'region' => 'Europe',
                    'city' => 'Kyiv',
                    'street' => 'Khreshchatyk',
                    'zip_code' => 23000,
                    'delivery_volume_id' => 1,
                    //'condition_id' => 1,
                    'availability_status_id' => 1,
                    'province_id' => 1,
                ]
            );
        }


        Advert::create(
            [
                'type' => 'accessories',
                'user_id' => 1,
                'title' => 'Rolex',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'price' => 200,
                'currency_id' => 1,
                'status_id' => 3,
                'surname' => 'Iskov',
                'name' => 'Anton',
                //'birthday' => '05.01.1999',
                'phone' => '0980000000',
                'country' => 'Ukraine',
                'region' => 'Europe',
                'city' => 'Kyiv',
                'street' => 'Khreshchatyk',
                'zip_code' => 23000,
                'delivery_volume_id' => 3,
                //'condition_id' => 2,
                'availability_status_id' => 2,
                'province_id' => 2,
            ]
        );

        Advert::create(
            [
                'type' => 'parts',
                'user_id' => 1,
                'title' => 'Casio',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'price' => 50,
                'currency_id' => 1,
                'status_id' => 3,
                'surname' => 'Iskov',
                'name' => 'Anton',
                //'birthday' => '05.01.1999',
                'phone' => '0980000000',
                'country' => 'Ukraine',
                'region' => 'Europe',
                'city' => 'Kyiv',
                'street' => 'Khreshchatyk',
                'zip_code' => 23000,
                'delivery_volume_id' => 2,
                //'condition_id' => 2,
                'availability_status_id' => 3,
                'province_id' => 3,
            ]
        );
    }
}
