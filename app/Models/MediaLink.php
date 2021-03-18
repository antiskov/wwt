<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, int $int)
 * @property int|mixed is_active
 * @property mixed name
 * @property mixed link_address
 */
class MediaLink extends Model
{
    use HasFactory;
}
