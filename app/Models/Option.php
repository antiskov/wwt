<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function watchAdverts()
    {
        return $this->belongsToMany(WatchAdvert::class,'watch_options','watch_advert_id','option_id')->using(WatchOption::class);
    }
}
