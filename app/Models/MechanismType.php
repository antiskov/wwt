<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static where(string $string, int $int)
 */
class MechanismType extends Model
{
    use HasFactory;

    public function watchAdverts()
    {
        return $this->hasMany(WatchAdvert::class);
    }

    public function accessoryAdvert()
    {
        return $this->hasMany(AccessoryAdvert::class);
    }
}
