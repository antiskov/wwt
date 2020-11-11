<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            MaterialsClaspSeeder::class,
            BraceletColorSeeder::class,
            WidthClaspSeeder::class,
            BraceletClaspSeeder::class,
            BraceletMaterialSeeder::class,
            WatchWaterproofSeeder::class,
            WatchThicknessSeeder::class,
            WatchBezelSeeder::class,
            WatchFigureSeeder::class,
            OptionSeeder::class,
            WatchDialSeeder::class,
            StateSeeder::class,
            ProvinceSeeder::class,
            TimeZoneSeeder::class,
            LanguageSeeder::class,
            SexesSeeder::class,
            UserRolesSeeder::class,
            StatusSeeder::class,
            UsersSeeder::class,
            CurrencySeeder::class,
            DeliveryVolumeSeeder::class,
            AvailabilityStatusSeeder::class,
            AdvertsSeeder::class,
            AdvertsImageSeeder::class,
            WatchModelSeeder::class,
            WatchAdvertSeeder::class,
            WatchOptionSeeder::class,

            AccessoryMakeSeeder::class,
            AccessoryAdvertSeeder::class,

            SparePartsMakeSeeder::class,
            SparePartsAdvertSeeder::class,
        ]);
    }
}
