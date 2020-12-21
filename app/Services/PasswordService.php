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
        /*$user=$userService->getUserByEmail($email);
        if($user) {
            $passwordService->resetPassword($user)
        }
        example

        */

        //todo: Сервис не должен заниматься редиректами. Он оперирует данными. Ерроры вынести в параметры
        //todo: check before this method
        if( $user = User::where('email', $request->email)->first()){
            if ($user->count() < 1) {
                return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
            }

            //todo: refactor one request
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(10),
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();

            if ($this->sendResetEmail($request->email, $tokenData->token)) {
                return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
            } else {
                return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => trans('Incorrect email')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
        $user = User::where('email', $email)->first();

        $link = route('forgot_password_token', $token);

        try {
            \Mail::to($email)->send(new ResetPassword($link));
            return true;
        } catch (\Exception $e) {

            return false;
        }
    }
}
