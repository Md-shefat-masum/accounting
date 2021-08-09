<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name','company','mobile','country', 'email', 'password',
    // ];

    protected $guarded = [];
    protected $appends = [
        'address_json',
        'auto_numbering_json',
    ];

    public function getAddressJsonAttribute()
    {
        return json_decode($this->address);
    }

    public function getAutoNumberingJsonAttribute()
    {
        return json_decode($this->auto_numbering);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
