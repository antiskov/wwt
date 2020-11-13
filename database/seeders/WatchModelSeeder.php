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

        WatchModel::create([
            'category_id' => 1,
            'watch_type_id' => 1,
            'watch_make_id' => 1,
            'title' => 'A1000D-7EF',
            'model_code' => 444,
            'sex_id' => 1,
            'height' => 10,
            'width' => 5,
            'mechanism_type_id' => 1,
            'photo' => 'a',
        ]);
    }
}
