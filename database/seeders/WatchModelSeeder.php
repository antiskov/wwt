<?php

namespace Database\Seeders;

use App\Models\MechanismType;
use App\Models\WatchMake;
use App\Models\WatchModel;
use App\Models\WatchType;
use Illuminate\Database\Seeder;

class WatchModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WatchType::create([
            'title' => 'Automatic',
        ]);

        WatchMake::create([
            'title' => 'Casio'
        ]);

        WatchMake::create([
            'title' => 'Apple'
        ]);

        MechanismType::create([
            'title' => 'Quartz',
        ]);

        for($i = 1; $i < 10; $i++) {
            WatchModel::create([
                'category_id' => 1,
                'watch_type_id' => 1,
                'watch_make_id' => 1,
                'title' => 'A1000D-7EF',
                'model_code' => 444,
                'sex_id' => rand(1,2),
                'height' => rand(10, 20),
                'width' => rand(1, 7),
                'mechanism_type_id' => 1,
                'photo' => 'a',
            ]);
        }
    }
}
