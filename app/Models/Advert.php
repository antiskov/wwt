<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews;

//    protected $fillable = [
//        'type',
//        'title',
//        'price',
//        'name',
//        'surname',
//    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function advertImages()
    {
        return $this->hasMany(AdvertImage::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function deliveryVolume()
    {
        return $this->belongsTo(DeliveryVolume::class);
    }

    public function availabilityStatus()
    {
        return $this->belongsTo(AvailabilityStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function watchAdvert()
    {
        return $this->hasOne(WatchAdvert::class);
    }

    public function basicImageAdvert()
    {
        return $this->hasOne(BasicImageAdvert::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function accessoryAdvert()
    {
        return $this->hasOne(AccessoryAdvert::class);
    }
    public function sparePartsAdvert()
    {
        return $this->hasOne(SparePartsAdvert::class);
    }

    public function favoriteAdverts()
    {
        return $this->hasMany(UserFavoriteAdvert::class);
    }
}
