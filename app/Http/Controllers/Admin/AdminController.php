<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getDashboard()
    {
        return view('admin.dashboard');
    }

    public function getPassport()
    {
        return view('admin.passport');
    }
}