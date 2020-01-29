<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;
use App\Models\App\Orders;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $view = 'admin.app';

    public function products(Request $request,$id=null)
    {
        $warehouse=Warehouse::all();
        $q=($id)??$warehouse[0]->id;
        $warehouse=$warehouse->pluck('name','id');
        return $this->view('products.index',compact('warehouse','q'));
    }

    public function orders(Request $request,$id=null)
    {
        $warehouse=Warehouse::all();
        $q=($id)??$warehouse[0]->id;
        $warehouse=$warehouse->pluck('name','id');
        return $this->view('orders.index',compact('warehouse','q'));
    }

    public function notSelectedProducts($id)
    {
        $warehouse=Warehouse::findOrFail($id);
        $selecteds=$warehouse->appitems()->pluck('item_id');
        $items=Items::with(['brand','categories','translations'])->whereNotIn('id',$selecteds)->get();
        $brands=Brands::all();
        $categories=Category::where('type','item')->get();
        return \Response::json(['error' => false, 'data' => $items,'brands'=>$brands,'categories'=>$categories]);
    }

    public function orderViev($id)
    {
        $order=Orders::findOrfail($id);
        return $this->view('orders.view',compact('order'));
    }

    public function addProduct(Request $request)
    {
        dd($request->all());
    }
}
