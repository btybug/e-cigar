<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:39 PM
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class ItemsTransfers extends Model
{
    protected $table = 'item_transfers';
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Items::class,'item_id');
    }

    public function from()
    {
        return $this->belongsTo(ItemsLocations::class,'from_id');
    }

    public function to()
    {
        return $this->belongsTo(ItemsLocations::class,'to_id');
    }

}
