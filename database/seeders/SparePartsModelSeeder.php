<?php

namespace Database\Seeders;

use App\Models\SparePartsCategory;
use App\Models\SparePartsMake;
use App\Models\SparePartsMechanismType;
use App\Models\SparePartsModel;
use App\Models\SparePartsType;
use Illuminate\Database\Seeder;

class SparePartsModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {

            SparePartsCategory::create(['title' => 'NameCategory'.$i]);
            SparePartsType::create(['title' => 'NameType'.$i]);
            SparePartsMake::create(['title' => 'NameMake'.$i]);
            SparePartsMechanismType::create(['title' => 'NameType'.$i]);

            SparePartsModel::create([
                'spare_parts_category_id' => $i,
                'spare_parts_type_id' => $i,
                'spare_parts_make_id' => $i,
                'spare_parts_mechanism_type_id' => $i,
                'sex_id' => 1,
                'title' => 'NameCategory'.$i,
                'model_code' => '000'.$i,
                'height' => '2'.$i,
                'width' => '100'.$i,
                'photo' => 'photo'.$i,
            ]);
        }
    }
}
