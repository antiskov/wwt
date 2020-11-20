<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidthClasp extends Model
{
    use HasFactory;

    public function watchAdverts()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
