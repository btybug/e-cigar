<?php

namespace App;

use Actuallymab\LaravelComment\CanComment;
use App\Models\Addresses;
use App\Models\App\AppPermissions;
use App\Models\App\Discount;
use App\Models\Coupons;
use App\Models\Dashboard;
use App\Models\Favorites;
use App\Models\MailJob;
use App\Models\Notifications\CustomEmails;
use App\Models\Orders;
use App\Models\ReferralBonus;
use App\Models\Roles;
use App\Models\Stock;
use App\Models\StockVariation;
use App\Models\Ticket;
use App\Models\UserNotes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string|null $avatar
 * @property string|null $referred_by
 * @property string|null $referral_code
 * @property string $country
 * @property string $gender
 * @property string $dob
 * @property int $status
 * @property int $age
 * @property int|null $role_id
 * @property string|null $verification_type
 * @property string|null $verification_image
 * @property string $customer_number
 * @property string|null $company_name
 * @property string|null $company_number
 * @property int $wholesaler_status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Addresses[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\App\AppPermissions[] $appPermissions
 * @property-read int|null $app_permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $bonus_bringers
 * @property-read int|null $bonus_bringers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Coupons[] $coupons
 * @property-read int|null $coupons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Notifications\CustomEmails[] $customEmails
 * @property-read int|null $custom_emails_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $favorites
 * @property-read int|null $favorites_count
 * @property-read \App\User|null $inviter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MailJob[] $mail_job
 * @property-read int|null $mail_job_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserNotes[] $notes
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Orders[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReferralBonus[] $referralBonus
 * @property-read int|null $referral_bonus_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $referral_bonuses
 * @property-read int|null $referral_bonuses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $referrals
 * @property-read int|null $referrals_count
 * @property-read \App\Models\Roles|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dashboard[] $widgets
 * @property-read int|null $widgets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCompanyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCustomerNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereReferralCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerificationImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWholesalerStatus($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username', 'email', 'password', 'phone', 'country', 'gender', 'status', 'referred_by', 'role_id',
        'verification_type', 'app_pass','verification_image', 'customer_number', 'dob', 'company_name', 'company_number', 'wholesaler_status'
    ];

    protected $appends = [
        'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAgeAttribute()
    {
        $dateOfBirth = $this->dob;
        if ($dateOfBirth == '0000-00-00') {
            return null;
        }

        $years = \Carbon\Carbon::parse($dateOfBirth)->age;
        return $years;
    }

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
        return $this->belongsToMany(Stock::class, 'favorites', 'user_id', 'stock_id');
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
        return ($this->role->type == 'backend') ? true : false;
    }

    public function isWholeseler()
    {
        return ($this->role->slug == 'wholesaler') ? true : false;
    }

    public function customEmails()
    {
        return $this->belongsToMany(CustomEmails::class, 'custom_email_user', 'user_id', 'custom_email_id')->withPivot(['is_read']);
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by', 'customer_number');
    }

    public function inviter()
    {
        return $this->belongsTo(User::class, 'referred_by', 'customer_number');
    }

    public function referral_bonuses()
    {
        return $this->belongsToMany(User::class, 'referral_bonus', 'user_id', 'bonus_bringing_user_id')->withPivot('status', 'type', 'id')->wherePivot('type', 'referral');
    }

    public function mail_job()
    {
        return $this->hasMany(MailJob::class, 'to', 'email');
    }

    public function referralBonus()
    {
        return $this->hasMany(ReferralBonus::class, 'user_id');
    }

    public function bonus_bringers()
    {
        return $this->belongsToMany(User::class, 'referral_bonus', 'user_id', 'bonus_bringing_user_id')->withPivot('status', 'type');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupons::class, 'referal_coupons', 'user_id', 'coupon_id');
    }

    public function widgets()
    {
        return $this->hasMany(Dashboard::class, 'user_id');
    }

    public function notes()
    {
        return $this->hasMany(UserNotes::class, 'user_id');
    }

    public function appPermissions()
    {
        return $this->belongsToMany(AppPermissions::class,'app_staff_permissions','user_id','permission_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class,'discount_staff','staff_id','discount_id');
    }
}
