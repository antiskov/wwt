<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Dialogs;
use App\Models\Messages;
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
            $currentDialog = isset($dialogs[0]) ? $dialogs[0] : 0;
        } else {
            $currentDialog=Dialogs::findOrFail($id);
        }
        if($currentDialog) {
            $service->setMessagesReadedInDialogForUser($currentDialog, Auth::id());
        }
        $messages=Messages::where('dialog_id',$currentDialog->id)->get();
        return view('profile_user.pages.my_messages',
        [
            'dialogs'=>$dialogs,
            'currentDialog'=>$currentDialog,
            'messages'=>$messages
        ]);
    }
    public function sendMessage(Request $request)
    {
        Log::info($request);
        $m=new Messages();
        $m->dialog_id=$request->dialog_id;
        $m->initiator_id=$request->initiator_id;
        $m->respondent_id=$request->respondent_id;
        $m->is_readed=0;
        $m->save();
        Message::dispatch($m);
    }
}
