<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class WatchOption extends Pivot
{
    use HasFactory;

    protected $table = 'watch_options';

    public function watchAdverts()
    {
        return $this->belongsTo(WatchAdvert::class);
    }
}
