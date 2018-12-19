<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class StockSales extends Model
{
    protected $table = 'stock_sales';

    protected $guarded = ['id'];

    protected $dates = ['created_at','updated_at'];

    protected $appends = array('availability');

    public function getAvailabilityAttribute()
    {
        return $this->calculateActivity($this->start_date,$this->end_date);
    }

    private function calculateActivity($start,$end){
        $result = null;
        $start = strtotime($start);
        $end = strtotime($end);
        $now = strtotime(today()->toDateString());

        if($now >= $start && $now <= $end){
            $result = 'current';
        }elseif ($now < $start){
            $result = 'coming';
        }elseif ($now > $end){
            $result = 'archive';
        }

        return $result;
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}