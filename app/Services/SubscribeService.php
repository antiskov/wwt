<?php

namespace App\Services;

use App\Models\Subscription;

class SubscribeService
{
    public function setSubscribe(string $email)
    {
        if(!Subscription::where('email', $email)->first()){
            $subscription = new Subscription();
            $subscription->email = $email;
            $subscription->save();
        }
    }

    public function changeSubscribe(string $email, $status)
    {
        if($subscription = Subscription::where('email', $email)->first()){
            $subscription->status = $status;
            $subscription->save();
        } else {
            $subscription = new Subscription();
            $subscription->email = $email;
            $subscription->save();
        }
    }
}
