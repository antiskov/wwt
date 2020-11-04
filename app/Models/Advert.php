<?php

namespace App\Models;

use Database\Seeders\AvailabilityStatusSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'price',
        'name',
        'surname',
    ];

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

}
