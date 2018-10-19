<?php
namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

class StockTranslation extends Model
{
    protected $table = 'stock_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}