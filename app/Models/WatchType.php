<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed is_active
 * @property mixed title
 * @method static where(string $string, int $int)
 * @method static create(string[] $array)
 */
class WatchType extends Model
{
    use HasFactory, SoftDeletes;

    public function watchAdverts()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
