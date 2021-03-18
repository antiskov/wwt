<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 * @property mixed title
 */
class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function adverts()
    {
        $this->hasMany(Advert::class);
    }
}
