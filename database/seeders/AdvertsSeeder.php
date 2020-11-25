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
        for($i = 1; $i < 200; $i++) {
            Advert::create(
                [
                    'type' => 'watch',
                    'user_id' => rand(1,2),
                    'title' => 'watch'.$i,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                    'price' => rand(100, 5000),
                    'currency_id' => 1,
                    'status_id' => 1,
                    'surname' => 'Iskov',
                    'name' => 'Anton',
                    //'birthday' => '05.01.1999',
                    'phone' => '0980000000',
                    'country' => 'Ukraine',
                    'region' => 'Region'.rand(1, 30),
                    'city' => 'Kyiv',
                    'street' => 'Khreshchatyk',
                    'zip_code' => 23000,
//                    'latitude' = '50°27′16″',
//                    'longtitude' = '30°31′25″',
                    'delivery_volume' => 'with box',
                    'photo'=>'small_acc.jpeg'

                ]
            );
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
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
            'IWC Schaffhausen',
        ];


//        for ($i = 0; $i < 10; $i++) {
//            Advert::create(
//                [
//                    'type' => 'accessories',
//                    'user_id' => 1,
//                    'title' => 'Brand'.$i,
//                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
//                    'price' => '200'.$i,
//                    'currency_id' => 1,
//                    'status_id' => rand(1,4),
//                    'surname' => 'Iskov',
//                    'name' => 'Anton',
//                    //'birthday' => '05.01.1999',
//                    'phone' => '0980000000',
//                    'country' => 'Ukraine',
//                    'region' => 'Kyivksa',
//                    'city' => 'Kyiv',
//                    'street' => 'Khreshchatyk',
//                    'zip_code' => 23000,
////                    'latitude' = '50°27′16″',
////                    'longtitude' = '30°31′25″',
//                'delivery_volume' => 'with box',
//                    'photo'=>'small_acc.jpeg,'
//
//                ]
//            );
//        }

//        foreach ($watches as $watch) {
//            Advert::create(
//                [
//                    'type' => 'watch',
//                    'user_id' => 1,
//                    'title' => $watch,
//                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
//                    'price' => 100,
//                    'currency_id' => 1,
//                    'status_id' => 1,
//                    'surname' => 'Iskov',
//                    'name' => 'Anton',
//                    //'birthday' => '05.01.1999',
//                    'phone' => '0980000000',
//                    'country' => 'Ukraine',
//                    'region' => 'Europe',
//                    'city' => 'Kyiv',
//                    'street' => 'Khreshchatyk',
//                    'zip_code' => 23000,
////                    'latitude' = '50°27′16″',
////                    'longtitude' = '30°31′25″',
//                    'delivery_volume' => 'with box',
//                    'photo'=>'small_acc.jpeg'
//
//                ]
//            );
//        }

//        for ($i = 34; $i < 43; $i++) {
//            Advert::create(
//                [
//                    'type' => 'parts',
//                    'user_id' => 1,
//                    'title' => 'Brand'.$i,
//                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
//                    'price' => '200'.$i,
//                    'currency_id' => 1,
//                    'status_id' => 1,
//                    'surname' => 'Iskov',
//                    'name' => 'Anton',
//                    //'birthday' => '05.01.1999',
//                    'phone' => '0980000000',
//                    'country' => 'Ukraine',
//                    'region' => 'Kyivksa',
//                    'city' => 'Kyiv',
//                    'street' => 'Khreshchatyk',
//                    'zip_code' => 23000,
////                    'latitude' = '50°27′16″',
////                    'longtitude' = '30°31′25″',
//                    'delivery_volume' => 'with box',
//                    'photo'=>'small_acc.jpeg,'
//
//                ]
//            );
//        }


    }
}
