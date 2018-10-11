<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Test;

class UserController extends Controller
{
    protected $view = 'admin.users';

    public function index()
    {
        $g = Test::where('code','en')->first();
//        $g->translateOrNew('en')->name = 'ENG';
//        $g->save();
        return view($this->view('index'));
    }
}