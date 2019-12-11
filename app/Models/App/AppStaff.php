<?php


namespace App\Models\App;


use App\Models\Warehouse;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AppStaff extends Model
{
    protected $table = 'app_staff';

    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class,'warehouses_id');
    }
}
