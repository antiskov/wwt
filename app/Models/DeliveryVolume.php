<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryVolume extends Model
{
    use HasFactory;

    public function adverts()
    {
        return $this->hasOne(Advert::class);
    }
}
