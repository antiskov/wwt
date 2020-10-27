<?php


namespace App\Services;



use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPassword
{
    public function resetPassword(string $email)
    {
        $user = User::where('email', '=', $email)->first();
        $random_password = Str::random(8);
        $user->forceFill([
            'password' => Hash::make($random_password)
        ])->save();

        return $random_password;
    }
}
