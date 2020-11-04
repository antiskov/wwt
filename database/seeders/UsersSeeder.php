<?php

namespace Database\Seeders;

use App\Models\Language;
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
        Language::create([''])

        User::create(
            [
                'email'=>'admin@admin.com',
                'password'=>Hash::make('12345678'),
                'is_active'=>1,
                'referral_code'=>'hahahahaha',
                'role_id'=>3
            ]
        );
    }
}
