<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Automatic',
            'Hendmatic'
        ];

        foreach ($categories as $category) {
            Category::create([
                'parent_id' => 1,
                'title' => $category,
                'slug' => $category,
            ]);
        }

    }
}
