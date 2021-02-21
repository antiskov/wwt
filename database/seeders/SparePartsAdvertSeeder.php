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
        for($i = 1; $i < 10; $i++) {

            SparePartsAdvert::create([
                'advert_id' => 34 + $i,
                'spare_parts_make_id' => $i,
                'spare_parts_model_id' => $i,
                'spare_parts_state' => 'new',
                'sex_id' => 1,
                'is_release_year_confirmed' => 1,
                'model_code' => '000'.$i,
                'height' => '2'.$i,
                'release_year' => '199'.$i,
                'width' => '100'.$i,
                'spare_parts_mechanism_type_id' => $i,
            ]);
        }
    }
}
