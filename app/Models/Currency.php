<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'symbol'
    ];

    public function adverts()
    {
        $this->hasOne(Advert::class);
    }
}
