<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Attributes;

class InventoryController extends Controller
{
    protected $view = 'admin.inventory';

    public function stock()
    {
        return $this->view('stock');
    }

    public function stockNew()
    {
        $attributes = Attributes::all();
        return $this->view('stock_new',compact(['attributes']));
    }
}