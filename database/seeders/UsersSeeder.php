<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'email'=>'dkor2017@gmail.com',
                'password'=>Hash::make('132435'),
                'is_active'=>1,
                'referral_code'=>'hahahahaha'
            ]
        );
    }
}
