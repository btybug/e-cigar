<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/28/2018
 * Time: 9:59 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class OtherController extends Controller
{
    protected $view = 'admin.inventory.other';

    public function getIndex()
    {
        return $this->view('index');
    }
}