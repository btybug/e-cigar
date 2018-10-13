<?php

namespace App;

use App\Models\Addresses;
use App\Models\Roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','username','email', 'password','phone','country','gender','status','role_id','verification_type','verification_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class,'role_id');
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class,'user_id');
    }

}
