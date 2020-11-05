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

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }

    public function watchMake()
    {
        return $this->belongsTo(WatchMake::class);
    }

    public function watchModel()
    {
        return $this->belongsTo(WatchModel::class);
    }

    public function watchType()
    {
        return $this->belongsTo(WatchType::class);
    }

    public function watchMaterial()
    {
        return $this->belongsTo(WatchMaterial::class);
    }

    public function mechanismType()
    {
        return $this->belongsTo(MechanismType::class);
    }

    public function braceletMaterial()
    {
        return $this->belongsTo(BraceletMaterial::class);
    }

    public function glass()
    {
        return $this->belongsTo(Glass::class);
    }
}
