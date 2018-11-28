<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/28/2018
 * Time: 9:59 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Items;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    protected $view = 'admin.inventory.other';

    public function getIndex()
    {
        return $this->view('index');
    }

    public function getNew()
    {
        $items=Items::all()->pluck('name','id');
        $model=null;
        return $this->view('new',compact('model','items'));
    }

    public function postOthers(Request $request)
    {
        dd($request->all());
    }

}