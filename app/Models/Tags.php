<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tags
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tags extends Model
{
    protected $table = 'tags';
    public $timestamps = false;

    protected $fillable = ['name','type'];
}