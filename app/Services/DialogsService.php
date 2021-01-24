<?php


namespace App\Services;


use App\Models\Advert;
use App\Models\Dialogs;
use Illuminate\Support\Facades\Auth;

class DialogsService
{
    private function findOrCreateDialogByAdvertId(Advert $advert)
    {
        $dialog = Dialogs::where('advert_id', $advert->id)->where('initiator_id',Auth::id())->first();
        if (!$dialog) {
            $dialog=new Dialogs();
            $dialog->advert_id=$advert->id;
            $dialog->initiator_id=Auth::id();
            $dialog->respondent_id=$advert->user_id;
        }
        return $dialog;
    }

    public function getLinkToTheDialog(Advert $advert)
    {
        $dialog=$this->findOrCreateDialogByAdvertId($advert);
        return route('DialogShow',['id'=>$dialog->id]);
    }
}
