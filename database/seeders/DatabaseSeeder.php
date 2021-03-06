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
        $this->call([
            StatusSeeder::class,
            TimeZoneSeeder::class,
            LanguageSeeder::class,
            SexesSeeder::class,
            UserRolesSeeder::class,
            UsersSeeder::class,
            CurrencySeeder::class,
            CategorySeeder::class,
            WatchModelSeeder::class,
//            AdvertsSeeder::class,
//            AdvertsImageSeeder::class,
//            WatchAdvertSeeder::class,
            MediaLinkSeeder::class,

//            AccessoryModelSeeder::class,
//            AccessoryAdvertSeeder::class,
//            AccessoryWatchSeeder::class,
//
//            SparePartsModelSeeder::class,
//            SparePartsAdvertSeeder::class,
//            SparePartsWatchSeeder::class,

        ]);
    }
}
