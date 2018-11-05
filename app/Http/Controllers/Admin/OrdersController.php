<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Statuses;

class OrdersController extends Controller
{
    protected $view = 'admin.orders';

    public function index()
    {

        return $this->view('index');
    }
    public function getManage($id)
    {
        $order=Orders::where('id',$id)
            ->with('shippingAddress')
            ->with('billingAddress')
            ->with('history')
            ->with('items')
            ->with('user')->first();
        if(!$order)abort(404);
        $statuses=Statuses::where('type','order')->get()->pluck('name','id');
        return $this->view('manage',compact('order','statuses'));
    }

    public function getNew()
    {
        return $this->view('new');
    }
}