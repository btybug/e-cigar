<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Import
 *
 * @property int $id
 * @property int $user_id
 * @property string $category
 * @property string $path
 * @property int $is_imported
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereIsImported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Import whereUserId($value)
 * @mixin \Eloquent
 */
class Import extends Model
{
    protected $guarded = ['id'];
}
