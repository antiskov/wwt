<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartsAdvert extends Model
{
    use HasFactory;

    public function sparePartsMechanismType()
    {
        return $this->belongsTo(SparePartsMechanismType::class);
    }

    public function sparePartsMake()
    {
        return $this->belongsTo(SparePartsMake::class);
    }

    public function sparePartsModel()
    {
        return $this->belongsTo(SparePartsModel::class);
    }

    public function watchModels()
    {
        return $this->belongsToMany(WatchModel::class, 'spare_parts_watches','spare_parts_advert_id','watch_model_id',);
    }
}
