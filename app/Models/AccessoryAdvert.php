<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryAdvert extends Model
{
    use HasFactory;

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }

    public function accessoryMechanismType()
    {
        return $this->belongsTo(AccessoryMechanismType::class);
    }

    public function accessoryMake()
    {
        return $this->belongsTo(AccessoryMake::class);
    }

    public function accessoryModel()
    {
        return $this->belongsTo(AccessoryModel::class);
    }

    public function watchModels()
    {
        return $this->belongsToMany(WatchModel::class, 'accessory_watches','accessory_advert_id','watch_model_id',);
    }
}
