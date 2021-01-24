<?php

namespace App\Http\Controllers;

use App\Services\DialogsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DialogsController extends Controller
{
    public function show($id = null, DialogsService $service)
    {
        $dialogs=$service->getUserDialogs(Auth::id());
        if($id) {
            $currentDialogId=isset($dialogs[0])?$dialogs[0]->id:0;
        }
        return view('profile_user.pages.my_messages');
    }
}
