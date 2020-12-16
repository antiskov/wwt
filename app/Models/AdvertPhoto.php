<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertPhoto extends Model
{
    use HasFactory, SoftDeletes;

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }
}
