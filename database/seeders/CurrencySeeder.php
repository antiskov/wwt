<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Currency;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create(
            [
                'title' => 'USD',
                'symbol' => '$',
            ]
        );
    }
}
