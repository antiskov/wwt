<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartsMake extends Model
{
    use HasFactory;

    public function sparePartsAdverts()
    {
        return $this->hasMany(SparePartsAdvert::class);
    }
}
