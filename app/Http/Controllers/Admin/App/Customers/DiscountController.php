<?php


namespace App\Http\Controllers\Admin\App\Customers;


use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\App\AppOffersDiscount;
use App\Models\App\AppWarehouses;
use App\Models\App\Discount;
use App\Models\Items;
use Illuminate\Http\Request;

class DiscountController extends Controller
{


    public function create($w_id)
    {
        $model = null;
        $current=AppWarehouses::findOrFail($w_id);
        $staff=$current->warehouse->staff->pluck('name','id')->toArray();
        return view('admin.app.discounts.create',compact('model','w_id','staff'));
    }

    public function postCreate(DiscountRequest $request)
    {
        $result=Discount::create($request->except("_token","staff"));
        $result->staff()->sync($request->get('staff'));
        return redirect()->route('app_customer_discounts',$request->get('app_warehouse_id'));
    }

    public function edit($id,$w_id)
    {
        $model = Discount::findOrFail($id);
        $staff=$model->staff->pluck('name','id')->toArray();
        return view('admin.app.discounts.create',compact('model','w_id','staff'));
    }

    public function postEdit(DiscountRequest $request,$id)
    {
        $model = Discount::findOrFail($id);
        $model->update($request->except("_token"));
        return redirect()->route('customer_discounts',$request->get('app_warehouse_id'));
    }



    public function offersCreate($w_id)
    {
        $items = Items::all()->pluck('name', 'id');
        $model = null;
        return view('admin.app.discounts.offers_create', compact('model', 'items','w_id'));
    }

    public function postOffersCreate(Request $request)
    {
        $date = $request->only('name','start_at','end_at','type','app_warehouse_id');
        $v=\Validator::make($date,[
            'name'=>'required',
            'start_at'=>'required',
            'end_at'=>'required',
            'type'=>'required',
            'app_warehouse_id'=>'required'
        ]);
        if ($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        $date['data'] = $request->except('_token', 'name', 'type');
        AppOffersDiscount::create($date);
        return redirect()->route('app_customer_offers',$date['app_warehouse_id']);
    }

    public function offersEdit($id,$w_id)
    {
        $items = Items::all()->pluck('name', 'id');
        $model = AppOffersDiscount::findOrFail($id);
        return view('admin.app.discounts.offers_create',compact('model','items','w_id'));
    }

    public function postOffersEdit(Request $request,$id)
    {
        $date = $request->only('name', 'type');
        $date['data'] = $request->except('_token', 'name', 'type');
        $model = AppOffersDiscount::findOrFail($id);
        $model->update($date);
        return redirect()->back();
    }

    public function postOnOff(Request $request)
    {
        Discount::where('id',$request->get('id'))->update(['status'=>$request->get('status')]);
        return response()->json(['error'=>false]);
    }

    public function postOffersOnOff(Request $request)
    {
        AppOffersDiscount::where('id',$request->get('id'))->update(['status'=>$request->get('status')]);
        return response()->json(['error'=>false]);
    }
}
