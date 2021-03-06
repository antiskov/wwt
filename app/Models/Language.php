<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'code'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserLanguage::class);
        return $this->belongsToMany(User::class);
    }
}
