<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchModel extends Model
{
    use HasFactory;

    public function watchAdvert()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
