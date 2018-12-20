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
    protected $guarded = ['id'];

    protected $casts = [
        'variations' => "json",
        'users' => "json",
    ];

    public static function updateOrCreate(int $id = null, array $data)
    {
        $model = self::find($id)??new static();
        (isset($model->id)) ? $model->update($data) : $model->fill($data) ;
        return $model->save();
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class,'product');
    }
}
