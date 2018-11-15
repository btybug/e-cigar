<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/15/2018
 * Time: 4:45 PM
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';
    protected $fillable = ['user_id', 'stock_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stcok()
    {
        return $this->belongsTo(Stock::class,'stock_id');
    }
}