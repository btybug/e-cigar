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

class OrdersController extends Controller
{
    protected $view = 'admin.orders';

    public function index()
    {

        return $this->view('index');
    }
    public function getManage($id=null)
    {
        $order=Orders::where('id',$id)
            ->with('shippingAddress')
            ->with('billingAddress')
            ->with('history')
            ->with('user')->first();
        return $this->view('manage',compact('order'));
    }

    public function getNew()
    {
        return $this->view('new');
    }
}