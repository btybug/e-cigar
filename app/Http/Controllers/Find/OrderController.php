<?php

namespace App\Http\Controllers\Find;

use App\DataTables\ItemsDataTable;
use App\DataTables\ItemsDataTableEditor;
use App\DataTables\OrdersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Couriers;
use App\Models\Orders;
use App\Models\Settings;
use App\Models\Statuses;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable,Request $request)
    {
        $data=$request->all();
        $settings= new Settings();
        $model = $settings->where('section','active_couriers')->where('val','1')->get();
        $filtered = $model->pluck('key');
        $couriers = Couriers::whereIn('id',$filtered)->get()->pluck('name','id');
        $payments_gateways = $settings->where('section','active_payments_gateways')->where('val','1')->pluck('key','key');
        $users=Orders::leftJoin('users','orders.user_id','=','users.id')->select('users.name as user_name','users.id as user_id')->pluck('user_name','user_id');
        $statuses=Statuses::where('type','order')->get()->pluck('name','id');
        return $dataTable->render('admin.find.orders.index',compact('couriers','payments_gateways','users','statuses','data'));
    }



}
