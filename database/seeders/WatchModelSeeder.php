<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MechanismType;
use App\Models\WatchAdvert;
use App\Models\WatchMake;
use App\Models\WatchMaterial;
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
        Category::create([
            'parent_id' => 2,
            'title' => 'Analog',
            'slug' => '4sb44s',
        ]);

        WatchType::create([
            'title' => 'Automatic',
        ]);

        WatchType::create([
            'title' => 'Chronograph',
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
