<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class WatchModel extends Model
{
    use HasFactory;

    public function watchAdvert()
    {
        return $this->hasMany(WatchAdvert::class);
    }
}
