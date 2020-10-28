<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @method static find(int|string|null $id)
 * @method static where(string $string, $email)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
