<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityStatus extends Model
{
    use HasFactory;

    public function adverts()
    {
        return $this->hasOne(Advert::class);
    }
}
