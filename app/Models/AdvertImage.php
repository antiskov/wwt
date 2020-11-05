<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{
    use HasFactory;

    protected $fillable = [
//        'full_path',
        'medium_path',
        'minified_path',
    ];

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }
}
