<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @method static where(string $string, $id)
 * @method static orderBy(string $string, string $string1)
 */
class Advert extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews;

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

    public function photos()
    {
        return $this->hasMany(AdvertPhoto::class);
    }

    public function getPrice()
    {
        return round($this->price);
    }

    public function dialogsCount()
    {
        return DB::table('dialogs')->where('advert_id', $this->id)->count();
    }
}
