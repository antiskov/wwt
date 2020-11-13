<?php

namespace Database\Seeders;

use App\Models\MaterialsClasp;
use Illuminate\Database\Seeder;

class MaterialsClaspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            "Сталь",
            "Золото",
        ];

        foreach ($materials as $material) {
            MaterialsClasp::create(['title' => $material]);
        }
    }
}
