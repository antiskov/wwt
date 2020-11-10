<?php

namespace Database\Seeders;

use App\Models\WatchOption;
use Illuminate\Database\Seeder;

class WatchOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 3; $i++) {
            WatchOption::create([
                'watch_advert_id' => $i,
                'option_id' => $i,
            ]);
        }
    }
}
