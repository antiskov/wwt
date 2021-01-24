<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dialogs extends Model
{
    use HasFactory;

    protected $appends = array('unreaded');

    public function initiator()
    {
        return $this->belongsTo(User::class,'initiator_id', 'id');
    }

    public function respondent()
    {
        return $this->belongsTo(User::class,'respondent_id','id');
    }

    public function advert()
    {
        return $this->belongsTo(Advert::class,'advert_id','id');
    }
    public function messages()
    {
        return $this->hasMany(Messages::class,'dialog_id','id')->where('initiator_id', Auth::id())->orWhere('respondent_id', Auth::id());
    }
    public function getUnreadedAttribute()
    {
        if (!Auth::id()) {
            return 0;
        }
        $count=0;
        foreach ($this->messages as $message) {
            if(Auth::id()==$message->respondent_id && $message->is_readed==0)
            {
                $count++;
            }
        }
        return $count;
    }
}
