<?php

namespace Database\Seeders;

use App\Models\AdvertImage;
use Illuminate\Database\Seeder;

class AdvertsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertImage::create(
            [
                'advert_id' => 1,
                'full_path' => 'big_yoda.jpg',
                'medium_path' => 'medium_yoda.jpg',
                'minified_path' => 'small_yoda.jpg',
                'uploaded_by' => 1,
                'is_active' => 10,
            ]
        );

        AdvertImage::create(
            [
                'advert_id' => 1,
                'full_path' => 'big_pokemon.png',
                'medium_path' => 'medium_pokemon.png',
                'minified_path' => 'small_pokemon.png',
                'uploaded_by' => 1,
                'is_active' => 10,
            ]
        );

        AdvertImage::create(
            [
                'advert_id' => 2,
                'full_path' => 'big_yoda.jpg',
                'medium_path' => 'medium_yoda.jpg',
                'minified_path' => 'small_yoda.jpg',
                'uploaded_by' => 1,
                'is_active' => 10,
            ]
        );

        AdvertImage::create(
            [
                'advert_id' => 2,
                'full_path' => 'big_pokemon.png',
                'medium_path' => 'medium_pokemon.png',
                'minified_path' => 'small_pokemon.png',
                'uploaded_by' => 1,
                'is_active' => 10,
            ]
        );
    }
}
