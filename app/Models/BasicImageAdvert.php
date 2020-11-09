<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicImageAdvert extends Model
{
    use HasFactory;

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }
}
