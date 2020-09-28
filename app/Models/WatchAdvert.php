<?php

namespace App\Models;

use App\Contracts\AdvertsInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchAdvert extends Model implements AdvertsInterface
{
    use HasFactory;

    public function getUserId()
    {
        return $this->user_id;
    }
}
