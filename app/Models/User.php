<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed id
 * @property mixed email
 * @property mixed surname
 * @property mixed name
 * @property mixed role
 * @property mixed is_active
 * @property int|mixed role_id
 * @property mixed|string password
 * @property mixed|string referral_code
 * @property mixed|string email_verification_code
 * @method static find(int|string|null $id)
 * @method static where(string $string, $email)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($users)
        {
            foreach ($users->usersettings()->get() as $usersetting)
            {
                $usersetting->delete();
            }
        });
    }

    /**
     * @return HasOne
     */
    public function usersettings()
    {
        return $this->hasOne(UserSettings::class);
    }

    public function adverts()
    {
        return $this->hasOne(Advert::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class,'user_languages','user_id','language_id');
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }

    public function favoriteAdverts()
    {
        return $this->belongsToMany(Advert::class,'user_favorite_adverts','user_id','advert_id')
            ->withPivot('deleted_at')->wherePivot('deleted_at', '=', null);
    }

    public function searchLinks()
    {
        return $this->hasMany(SearchLink::class)->orderBy('id', 'desc');
    }
}
