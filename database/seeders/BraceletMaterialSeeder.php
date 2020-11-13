<?php

namespace Database\Seeders;

use App\Models\BraceletMaterial;
use Illuminate\Database\Seeder;

class BraceletMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            'Сталь',
            "Кожа",
            "Золото",
        ];

        foreach ($materials as $material) {
            BraceletMaterial::create(['title' => $material]);
        }
    }
}
