<?php

namespace Database\Seeders;

use App\Models\AccessoryCategory;
use App\Models\AccessoryMake;
use App\Models\AccessoryMechanismType;
use App\Models\AccessoryModel;
use App\Models\AccessoryType;
use App\Models\DeliveryVolume;
use Illuminate\Database\Seeder;

class AccessoryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {

            AccessoryCategory::create(['title' => 'NameCategory'.$i]);
            AccessoryType::create(['title' => 'NameType'.$i]);
            AccessoryMake::create(['title' => 'NameMake'.$i]);
            AccessoryMechanismType::create(['title' => 'NameType'.$i]);

            AccessoryModel::create([
                'accessory_category_id' => $i,
                'accessory_type_id' => $i,
                'accessory_make_id' => $i,
                'accessory_mechanism_type_id' => $i,
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
