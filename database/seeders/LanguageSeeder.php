<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([ 'code' => 'ua' ]);
        Language::create([ 'code' => 'ru' ]);
        Language::create([ 'code' => 'en']);
    }
}
