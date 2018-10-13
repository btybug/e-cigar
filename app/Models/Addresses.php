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

class Addresses extends Model
{
    /**
     * @var string
     */
    protected $table = 'addresses';
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'company','type', 'first_line_address', 'second_line_address', 'city', 'country', 'post_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}