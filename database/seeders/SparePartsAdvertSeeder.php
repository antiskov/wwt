<?php

namespace Database\Seeders;

use App\Models\SparePartsAdvert;
use Illuminate\Database\Seeder;

class SparePartsAdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 25; $i <= 36; $i++) {

            SparePartsAdvert::create([
                'advert_id' => $i,
//                'watch_type_id' => 1,
                'spare_parts_make_id' => 1,
//                'watch_model_id' => 1,
//                'model_code' => 471-874-9,
//                'sex_id' => 1,
//                'release_year' => 2000,
//                'is_release_year_confirmed' => 1,
//                'height' => 100,
//                'width' => 40,
//                'mechanism_type_id' => 1,
//                'watch_material_id' => 1,
//                'bracelet_material_id' => 2,
//                'glass_id' => 1,
//                'diameter_watch_id' => 1,
//                'year_advert_id' => 1,
//                'state_id' => 2,
//                'watch_dial_id' => 2,
//                'watch_figure_id' => 1,
//                'watch_bezel_id' => 2,
//                'watch_thickness_id' => 3,
//                'watch_waterproof_id' => 2,
//                'bracelet_clasp_id' => 2,
//                'materials_clasp_id' => 1,
//                'bracelet_color_id' => 2,
//                'width_clasp_id' => 1,
            ]);
        }
    }
}
