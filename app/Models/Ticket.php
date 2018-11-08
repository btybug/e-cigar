<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
      'tags' => 'json'
    ];

    public function attachments()
    {
        return $this->hasMany(self::class,  'id','ticket_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function status()
    {
        return $this->hasOne(Statuses::class,'id','status_id');
    }

    public function priority()
    {
        return $this->hasOne(Statuses::class,'id','priority_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}