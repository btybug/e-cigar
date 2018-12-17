<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;
class Coupons extends Model
{
    /**
     * @var string
     */
    protected $table = 'coupons';
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'type', 'discount','total_amount','shipping_type','products','start_date','end_date','user_per_coupon','user_per_customer','based','status'
    ];

    protected $casts = [
        'products' => "json"
    ];

    public static function updateOrCreate(int $id = null, array $data)
    {
        $model = self::find($id)??new static();
        (isset($model->id)) ? $model->update($data) : $model->fill($data) ;
        return $model->save();
    }
}
