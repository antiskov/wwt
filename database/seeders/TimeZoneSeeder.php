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
        Timezone::create([
            'title' => '(UTC -12:00) Всемирное координированное время -12',
            'time_difference' => 12,
            'title' => '(UTC -12:00) Всемирное координированное время -15',
            'time_difference' => 15,
        ]);
    }
}
