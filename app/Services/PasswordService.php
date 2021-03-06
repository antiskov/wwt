<?php

namespace App\Services;

use App\Http\Requests\ManagePasswordRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordService
{

    /**
     * @param ManagePasswordRequest $request
     * @return string[]
     */
    public function resetPassword(ManagePasswordRequest $request)
    {
        $data = DB::table('password_resets');

        $data->insert([
            'email' => $request->email,
            'token' => Str::random(10),
            'created_at' => Carbon::now()
        ]);

        $tokenData = $data->where('email', $request->email)->first();


        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return ['status', 'A reset link has been sent to your email address.'];
        } else {
            return ['error', 'A Network Error occurred. Please try again.'];
        }
    }

    /**
     * @param $email
     * @param $token
     * @return bool
     */
    private function sendResetEmail($email, $token)
    {
        $link = route('forgot_password_token', $token);

        try {
            \Mail::to($email)->send(new ResetPassword($link));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
