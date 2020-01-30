<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;
use App\Models\App\AppItems;
use App\Models\App\AppWarehouses;
use App\Models\App\Orders;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $view = 'admin.app';

    public function products(Request $request, $q = null)
    {
        $warehouse = Warehouse::whereIn('id', AppWarehouses::all()->pluck('warehouse_id'))->get();
        $notImportedWarehouse = Warehouse::whereNotIn('id', AppWarehouses::all()->pluck('warehouse_id'))->get();
        if (!count($warehouse) && $q) abort(404);
        if($q==null){
            $q=count($warehouse)?$warehouse[0]->id:null;
        }else{
            if(!AppWarehouses::where('warehouse_id',$q)->exists()){
                abort(404);
            }
        }
        $warehouse = $warehouse->pluck('name', 'id');
        return $this->view('products.index', compact('warehouse', 'q', 'notImportedWarehouse'));
    }

    public function orders(Request $request, $id = null)
    {
        $warehouse = Warehouse::all();
        $q = ($id) ?? $warehouse[0]->id;
        $warehouse = $warehouse->pluck('name', 'id');
        return $this->view('orders.index', compact('warehouse', 'q'));
    }

    public function notSelectedProducts($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $selecteds = $warehouse->appitems()->pluck('item_id');
        $items = Items::with(['brand', 'categories', 'translations'])->whereNotIn('id', $selecteds)->get();
        $brands = Brands::all();
        $categories = Category::where('type', 'item')->get();
        return \Response::json(['error' => false, 'data' => $items, 'brands' => $brands, 'categories' => $categories]);
    }

    public function orderViev($id)
    {
        $order = Orders::findOrfail($id);
        return $this->view('orders.view', compact('order'));
    }

    public function addProduct(Request $request)
    {
        $shop_id = $request->get('shop_id');
        $items = $request->get('products');
        $warehouse = Warehouse::findOrFail($shop_id);
        $defaultRack = $warehouse->default_rack();
        $warehouse->appItems()->attach($items);
        return response()->json(['error' => false]);
    }

    public function importShop(Request $request)
    {
        foreach ($request->get('warehouse', []) as $w) {
            AppWarehouses::create(['warehouse_id' => $w]);
        }
        return redirect()->back();
    }

    public function activateProduct($id)
    {
        AppItems::where('id', $id)->update(['status' => 1]);
        return response()->json(['error' => false]);
    }

    public function draftProduct($id)
    {
        AppItems::where('id', $id)->update(['status' => 0]);
        return response()->json(['error' => false]);
    }
}
