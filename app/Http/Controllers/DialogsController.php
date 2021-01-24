<?php

namespace App\Http\Controllers;

use App\Services\DialogsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DialogsController extends Controller
{
    public function show($id = null, DialogsService $service)
    {
        $dialogs=$service->getUserDialogs(Auth::id());
        if($id) {
            $currentDialog=isset($dialogs[0])?$dialogs[0]:0;
        }
        if($currentDialog) {
            $service->setMessagesReadedInDialogForUser($currentDialog, Auth::id());
        }
        return view('profile_user.pages.my_messages',
        [
            'dialogs'=>$dialogs,
            'currentDialog'=>$currentDialog
        ]);
    }
}
