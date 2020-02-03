<?php


namespace App\Http\Controllers\Admin\App\Customers;


use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\App\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::get();
        return view('admin.app.discounts.index',compact(['discounts']));
    }

    public function create()
    {
        $model = null;
        return view('admin.app.discounts.create',compact('model'));
    }

    public function postCreate(DiscountRequest $request)
    {
        Discount::create($request->except("_token"));
        return redirect()->route('app_customer_discounts');
    }

    public function edit($id)
    {
        $model = Discount::findOrFail($id);
        return view('admin.app.discounts.create',compact('model'));
    }

    public function postEdit(DiscountRequest $request,$id)
    {
        $model = Discount::findOrFail($id);
        $model->update($request->except("_token"));
        return redirect()->route('customer_discounts');
    }

    public function offers()
    {
        $discounts = Discount::get();
        return view('admin.app.discounts.offers',compact(['discounts']));
    }

    public function offersCreate()
    {
        $model = null;
        return view('admin.app.discounts.offers_create',compact('model'));
    }

    public function postOffersCreate(DiscountRequest $request)
    {
        Discount::create($request->except("_token"));
        return redirect()->route('customer_offers');
    }

    public function offersEdit($id)
    {
        $model = Discount::findOrFail($id);
        return view('admin.app.discounts.offers_create',compact('model'));
    }

    public function postOffersEdit(DiscountRequest $request,$id)
    {
        $model = Discount::findOrFail($id);
        $model->update($request->except("_token"));
        return redirect()->route('customer_offers');
    }
}
