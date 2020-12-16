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
        for ($i = 1; $i < 200; $i++) {
            Advert::create(
                [
                    'type' => 'watch',
                    'user_id' => rand(1, 2),
                    'title' => 'watch' . $i,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'price' => rand(100, 5000),
                    'currency_id' => 1,
                    'status_id' => 1,
                    'surname' => 'Iskov',
                    'name' => 'Anton',
                    //'birthday' => '05.01.1999',
                    'phone' => '0980000000',
                    'country' => 'Ukraine',
                    'region' => 'Region' . rand(1, 30),
                    'city' => 'Kyiv',
                    'street' => 'Khreshchatyk',
                    'zip_code' => 23000,
//                    'latitude' = '50°27′16″',
//                    'longtitude' = '30°31′25″',
                    'delivery_volume' => 'with box',
                    'photo' => 'small_acc.jpeg',
                    'vip_status' => rand(0, 1),
                    'price_rate' => 1,

                ]
            );
        }
    }
}
