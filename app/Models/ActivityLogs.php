<?php


namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class ActivityLogs extends Model
{
    protected $fillable = ['user_id', 'object_name', 'action_type', 'object_id'];
    protected $table = 'activity_logs';
    protected $connection = 'mongodb';

    public static function action($object_name, $action_type, $object_id, $user_id = null)
    {
        $user_id=($user_id)?$user_id:\Auth::id();
        return self::create(compact('user_id','object_name','object_id','action_type'));
    }
}
