<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogs extends Model
{
    use HasFactory;

    public function initiator()
    {
        return $this->belongsTo(User::class, 'id','initiator_id');
    }

    public function respondent()
    {
        return $this->belongsTo(User::class,'id','respondent_id');
    }

    public function advert()
    {
        return $this->belongsTo(Advert::class,'id','advert_id');
    }
    public function messages()
    {
        return $this->hasMany(Messages::class,'dialog_id','id');
    }
}
