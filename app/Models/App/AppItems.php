<?php


namespace App\Models\App;


use App\Models\Items;
use Illuminate\Database\Eloquent\Model;

class AppItems extends Model
{
    protected $table = 'app_items';

    protected $guarded=['id'];

    public function item()
    {
        return $this->belongsTo(Items::class,'item_id');
    }
}
