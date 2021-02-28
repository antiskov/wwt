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
        if(!$id) {
            $currentDialog = isset($dialogs[0])? $dialogs[0] : 0;
        } else {
            $currentDialog=Dialogs::findOrFail($id);
        }
        if($currentDialog) {
            $service->setMessagesReadedInDialogForUser($currentDialog->id, Auth::id());
        }
        if($currentDialog) {
            $messages=Messages::where('dialog_id',$currentDialog->id)->get();
        } else {
            $messages=[];
        }
        $respondentId=Auth::id()==$currentDialog->advert->user_id?$currentDialog->initiator_id:$currentDialog->respondent_id;
        $respondent_avatar=$currentDialog?(new \App\Services\ProfileService())->getAvatar($respondentId):'/images/content/person.png';
        $ua=(new \App\Services\ProfileService())->getAvatar(Auth::id());
        $user_avatar=$ua?$ua:'/images/icons/wwt_profile_avatar.png';

        return view('profile_user.pages.my_messages',
        [
            'dialogs'=>$dialogs,
            'currentDialog'=>$currentDialog,
            'messages'=>$messages,
            'respondent_avatar'=>$respondent_avatar,
            'user_avatar'=>$user_avatar
        ]);
    }

    public function getMessage($id) {
        return Messages::where('dialog_id',$id)->get();
    }

    public function sendMessage(Request $request)
    {
        $m=new Messages();
        $m->dialog_id=$request->dialog_id;
        $m->initiator_id=$request->initiator_id;
        $m->respondent_id=$request->respondent_id;
        $m->text=$request->text;
        $m->is_readed=0;
        $m->save();

        Message::dispatch($m);
        return $m;
    }
}
