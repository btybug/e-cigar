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
//        $emails=\LaravelGmail::message()->all();
//        $messages = \LaravelGmail::message()->unread()->preload()->all();
//        foreach ( $messages as $message ) {
//            $body = $message->getHtmlBody();
//            $subject = $message->getSubject();
//            echo $subject.'<br>'.$body.'<hr>';
//        }
//        die;
        //1688496308af6e9c
//        dd($emails[0]->getId());
//        dd(\LaravelGmail::message()->get('16884bacc2ccc24d'));
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