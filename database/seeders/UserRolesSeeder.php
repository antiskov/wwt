<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['title'=>'user']);
        Role::create(['title'=>'manager']);
        Role::create(['title'=>'admin']);
    }
}
