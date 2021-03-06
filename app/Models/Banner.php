<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'description',
      'date_start',
      'date_finish',
      'banner_image',
    ];
}
