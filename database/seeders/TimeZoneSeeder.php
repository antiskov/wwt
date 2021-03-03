<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Timezone;
use Illuminate\Database\Seeder;

class TimeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = time();
        $zonesNumber = [];
        foreach (timezone_identifiers_list() as $zone) {
            date_default_timezone_set($zone);
            $zonesNumber[] = date('P', $timestamp);
        }

        $uniqueNumber = array_unique($zonesNumber);
        sort($uniqueNumber);

        foreach ($uniqueNumber as $zone) {
            Timezone::create(['title' => 'UTC/GMT ', 'time_difference' => $zone]);
        }
    }
}
