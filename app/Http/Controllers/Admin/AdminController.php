<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:15
 */

namespace App\Http\Controllers\Admin;


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
        $roles = Roles::where('type', 'frontend')->pluck('title', 'id')->toArray();
        $billing_address = $user->addresses()->where('type', 'billing_address')->first();
        $default_shipping = $user->addresses()->where('type', 'default_shipping')->first();
        $address = $user->addresses()->where(function ($query){
            $query->where('type','address_book')->orWhere('type','default_shipping');
        })->pluck('first_line_address', 'id');
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries', 'geo_zones.id', '=', 'zone_countries.geo_zone_id')
                ->select('zone_countries.*', 'zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        return view('admin.dashboard_profile',compact('user', 'countries', 'roles','billing_address','default_shipping','address','countriesShipping'));
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