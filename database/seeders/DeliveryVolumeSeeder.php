<?php

namespace Database\Seeders;

use App\Models\AvailabilityStatus;
use App\Models\DeliveryVolume;
use Illuminate\Database\Seeder;

class DeliveryVolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryVolume::create([ 'title' => 'С оригинальными документами и коробкой']);
        DeliveryVolume::create([ 'title' => 'В коробке без документов' ]);
        DeliveryVolume::create([ 'title' => 'С документами без коробки' ]);
        DeliveryVolume::create([ 'title' => 'Без документов и коробки' ]);
    }
}
