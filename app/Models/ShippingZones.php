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

class ShippingZones extends Model
{
    /**
     * @var string
     */
    protected $table = 'shipping_zones';
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'tax', 'percentage','country','region'
    ];

    public static function updateOrCreate(int $id = null, array $data)
    {
        $model = self::find($id)??new static();
        (isset($model->id)) ? $model->update($data) : $model->fill($data) ;
        return $model->save();
    }
}
