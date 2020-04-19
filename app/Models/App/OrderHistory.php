<?php


namespace App\Models\App;


use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'basket_history';

    protected $fillable=['basket_id','data'];

    protected $casts=['data'=>'array'];
}
