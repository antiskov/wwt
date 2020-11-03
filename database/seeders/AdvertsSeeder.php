<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Role;
use App\Models\User;
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
        Advert::create(
            [
                'type' => 'watch',
                'user_id' => 1,
                'title' => 'iWatch',
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
            ]
        );

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
            ]
        );
    }
}
