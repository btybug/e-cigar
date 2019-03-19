<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


class BarcogesController extends Controller
{
    protected $view = 'admin.inventory.Barcodes';




    public function getIndex()
    {
        return $this->view('index');
    }


}
