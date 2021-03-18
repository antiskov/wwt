<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static where(string $string, mixed $deliveryVolume)
 * @property int|mixed is_active
 */
class DeliveryVolume extends Model
{
    use HasFactory;

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
}
