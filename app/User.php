<?php

namespace App;

use Actuallymab\LaravelComment\CanComment;
use App\Models\Addresses;
use App\Models\Favorites;
use App\Models\Orders;
use App\Models\Roles;
use App\Models\Stock;
use App\Models\Ticket;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username', 'email', 'password', 'phone', 'country', 'gender', 'status', 'role_id', 'verification_type', 'verification_image','customer_number'
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
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class, 'user_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id')->with('items')->with('history');
    }

    public function favorites()
    {
        return $this->belongsToMany(Stock::class, 'favorites','user_id','stock_id');
    }

    public function authorAttributes()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'url' => 'URL',    // optional
            'avatar' => '/public/images/' . $this->gender . '.png', // optional
        ];
    }

    public function sendEmailVerificationNotification()
    {

    }

    public function sendPasswordResetNotification($token)
    {

    }

    public function isAdministrator()
    {
        return (bool)$this->role_id;
    }

}
