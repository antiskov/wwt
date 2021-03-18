<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, Advert $advert)
 * @property mixed user_id
 * @property mixed advert_id
 */
class ModeratedAdvert extends Model
{
    use HasFactory;
}
