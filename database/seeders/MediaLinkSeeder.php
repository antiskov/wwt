<?php

namespace Database\Seeders;

use App\Models\MediaLink;
use Illuminate\Database\Seeder;

class MediaLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MediaLink::create([
            'name' => 'facebook',
            'link_address' => 'facebook.com',
            'is_active' => 0,
            'path' => 'facebook-hover.svg',
            'type' => 'icon'
        ]);

        MediaLink::create([
            'name' => 'instagram',
            'link_address' => 'instagram.com',
            'is_active' => 0,
            'path' => 'insta-hover.svg',
            'type' => 'icon'
        ]);

        MediaLink::create([
            'name' => 'youtube',
            'link_address' => 'youtube.com',
            'is_active' => 0,
            'path' => 'youtube-hover.svg',
            'type' => 'icon'
        ]);

        MediaLink::create([
            'name' => 'twitter',
            'link_address' => 'twitter.com',
            'is_active' => 0,
            'path' => 'twiter-hover.svg',
            'type' => 'icon'
        ]);

        MediaLink::create([
            'name' => 'google play',
            'link_address' => 'play.google.com',
            'is_active' => 0,
            'path' => 'google-play.png',
            'type' => 'image'
        ]);

        MediaLink::create([
            'name' => 'apple store',
            'link_address' => 'www.apple.com/shop',
            'is_active' => 0,
            'path' => 'App-store.png',
            'type' => 'image'
        ]);
    }
}
