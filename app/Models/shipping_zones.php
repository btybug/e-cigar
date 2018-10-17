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

class shipping_zones extends Model
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


}
