<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class AccessoryMake extends Model
{
    use HasFactory;

    public function accessoryAdverts()
    {
        return $this->hasMany(AccessoryAdvert::class);
    }
}
