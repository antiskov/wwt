<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $id)
 */
class UserFavoriteAdvert extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table='user_favorite_adverts';
}
