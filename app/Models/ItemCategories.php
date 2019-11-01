<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    protected $table = 'item_categories';


    public function category()
    {
       return $this->belongsTo(Category::class,'categories_id');
    }

}
