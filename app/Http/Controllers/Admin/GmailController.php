<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 1/25/2019
 * Time: 12:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GmailController extends Controller
{
    protected $view = 'admin.gamil';

    public function index()
    {
        return $this->view('index');
    }

    public function callBack(Request $request)
    {
        dd($request->all());
    }
}