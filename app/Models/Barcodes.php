<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Barcodes extends Model
{
    protected $table = 'barcodes';
    protected $fillable=['code'];
}
