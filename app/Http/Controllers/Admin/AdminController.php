<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\AdminProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Services\ManagerApiRequest;
use App\Services\Widgets;
use App\User;
use PragmaRX\Countries\Package\Countries;
use App\Models\GeoZones;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $geoZones;

    public function __construct(
        GeoZones $geoZones
    )
    {
        $this->geoZones = $geoZones;
    }
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

    public function getProfile(Request $request,Countries $countries)
    {
        $user = \Auth::user();
        $countries = $countries->all()->pluck('name.common', 'name.common')->toArray();

        return view('admin.dashboard_profile',compact('user', 'countries'));
    }

    public function postProfile(AdminProfileRequest $request)
    {
        $data = $request->except(['_token','avatar']);
        $user = \Auth::user();
        $user->update($data);
        
        return redirect()->back()->with('message','Your profile updated');
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

    public function quickEmail(Request $request,Widgets $widgets)
    {
        $widgets->quickEmailSend($request);
        return ['error'=>false];
    }
}