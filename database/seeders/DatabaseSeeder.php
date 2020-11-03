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
//            UserRolesSeeder::class,
//            UsersSeeder::class,
//            StatusSeeder::class,
//            CurrencySeeder::class,
//            AdvertsSeeder::class,
            AdvertsImageSeeder::class,

        ]);
    }
}
