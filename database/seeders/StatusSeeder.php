<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([ 'title' => 'published' ]);
        Status::create([ 'title' => 'moderation' ]);
        Status::create([ 'title' => 'sales' ]);
        Status::create([ 'title' => 'draft']);
    }
}
