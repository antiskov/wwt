<?php

namespace Database\Seeders;

use App\Models\AvailabilityStatus;
use App\Models\DeliveryVolume;
use Illuminate\Database\Seeder;

class AvailabilityStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AvailabilityStatus::create([ 'title' => 'В наличии']);
        AvailabilityStatus::create([ 'title' => 'Ожидать' ]);
        AvailabilityStatus::create([ 'title' => 'Нету в наличии' ]);
    }
}
