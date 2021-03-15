<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $user_id)
 * @property int|mixed adverts_count
 * @property mixed user_id
 */
class UserCountAdvert extends Model
{
    use HasFactory;
}
