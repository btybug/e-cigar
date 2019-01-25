<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\ManagerApiRequest;

class AdminController extends Controller
{
    public function getDashboard()
    {
        dd(\LaravelGmail::message()->all());
//        \DB::table('users')->insert([
//            'name' => 'Manager',
//            'username' => 'supermanager',
//            'email' => 'manager@gmail.com',
//            'password' => bcrypt('manager'),
//            'last_name'=>'Adminyan',
//            'phone'=>'041522323',
//            'country'=>'Yerevan',
//            'status'=>1,
//            'gender'=>'male',
//            'role_id'=>2
//        ]);
        return view('admin.dashboard');
    }
    public function test(ManagerApiRequest $request)
    {
        dd($request->exportOrder(8));
    }

    public function getPassport()
    {
        return view('admin.passport');
    }

    public function roles()
    {
        return view('');
    }
}