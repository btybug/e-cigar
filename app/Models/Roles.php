<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'type', 'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function hasAccess($route)
    {
        return $this->permissions()->where('slug',$route)->exists();
    }
}