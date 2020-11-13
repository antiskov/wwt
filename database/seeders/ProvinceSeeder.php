<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Sex;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            'Винницкая',
            'Волынская',
            'Днепропетровская',
            'Донецкая',
            'Житомирская',
            'Закарпатская',
            'Запорожская',
            'Ивано-Франковская',
            'Киевская',
            'Кировоградская',
            'Луганская',
            'Львовская',
            'Николаевская',
            'Одесская',
            'Полтавская',
            'Ровненская',
            'Сумская',
            'Тернопольская',
            'Харьковская',
            'Херсонская',
            'Хмельницкая',
            'Черкасская',
            'Черниговская',
            'Черновицкая',
        ];

        foreach ($provinces as $province) {
            Province::create(['title' => $province]);
        }
    }
}
