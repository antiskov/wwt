<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            'Дата',
            "Хронограф",
            "Индикатор дней недели",
            "Будильник",
        ];

        foreach ($options as $option) Option::create(['title' => $option]);
    }
}
