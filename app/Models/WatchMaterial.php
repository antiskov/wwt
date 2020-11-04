<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchMaterial extends Model
{
    use HasFactory;

    public function watchAdvert()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
