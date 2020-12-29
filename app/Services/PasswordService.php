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

    public function resetPassword(ManagePasswordRequest $request)
    {

        //todo: Сервис не должен заниматься редиректами. Он оперирует данными. Ерроры вынести в параметры.done
        //todo: check before this method.done

        //todo: refactor one request.done
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
