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
use App\Models\Category;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    protected $view = 'admin.inventory.options';

    public function getIndex()
    {
        return $this->view('index');
    }

}