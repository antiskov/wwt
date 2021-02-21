<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{id}', function ($user, $id) {
    $dialog=\App\Models\Dialogs::where('initiator_id', $user->id)->orWhere('respondent_id',$user->id);
    if($dialog) {
        return true;
    }
    return false;
});
