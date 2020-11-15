<?php

namespace Database\Seeders;

use App\Models\AdvertImage;
use App\Models\BasicImageAdvert;
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

        for($i = 1; $i < 11; $i++)
        BasicImageAdvert::create([
            'advert_id' => $i,
            'title' => 'small_acc.jpeg',
        ]);
        for($i = 11; $i <= 24; $i++)
        BasicImageAdvert::create([
            'advert_id' => $i,
            'title' => 'watch-1.png',
        ]);
        for($i = 25; $i <= 36; $i++)
        BasicImageAdvert::create([
            'advert_id' => $i,
            'title' => 'small_acc.jpeg',
        ]);
    }
}
