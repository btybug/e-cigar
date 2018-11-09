<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\OrderHistoryRequest;
use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use App\Models\Orders;
use App\Models\Statuses;
use Illuminate\Http\Request;

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

    public function addNote(OrderHistoryRequest $request)
    {
        $order = Orders::findOrFail($request->id);
        $last = $order->history()->latest()->first();
        if($last){
            $new = $last->replicate();
            if($request->status_id){
                $new->status_id =  $request->status_id;
            }
            $new->note = $request->note;
            $new->save();
        }else{
            $order->history()->create([
                'status_id' => $request->status_id,
                'note' => $request->note,
            ]);
        }

        $histories = $order->history()->orderBy('created_at','desc')->get();
        $html = \View('admin.orders._partials.timeline_item',compact(['histories']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }
}