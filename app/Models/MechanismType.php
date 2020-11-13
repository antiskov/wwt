<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanismType extends Model
{
    use HasFactory;

    public function watchAdverts()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
