<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;
use App\Models\App\AppItems;
use App\Models\App\AppWarehouses;
use App\Models\App\Orders;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Items;
use App\Models\Settings;
use App\Models\Warehouse;
use Google\Auth\Cache\Item;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $view = 'admin.app';

    public function warehouse($q = null)
    {
        $current = null;
        $warehouse = AppWarehouses::join('warehouses', 'app_warehouses.warehouse_id', '=', 'warehouses.id')
            ->leftJoin('warehouse_translations', 'warehouses.id', '=', 'warehouse_translations.warehouse_id')
            ->where('warehouse_translations.locale', app()->getLocale())
            ->select('warehouses.*', 'warehouse_translations.name', 'app_warehouses.status')->get();
        $notImportedWarehouse = Warehouse::whereNotIn('id', AppWarehouses::all()->pluck('warehouse_id'))->get();
        if (!count($warehouse) && $q) abort(404);
        if ($q == null) {
            $q = count($warehouse) ? $warehouse[0]->id : null;
        } else {
            if (!AppWarehouses::where('warehouse_id', $q)->exists()) {
                abort(404);
            } else {
                $current = AppWarehouses::where('warehouse_id', $q)->first();
            }
        }
        return $this->view('warehouse', compact('current'));
    }

    public function products(Request $request, $q)
    {
        $current = null;
        $warehouse = AppWarehouses::join('warehouses', 'app_warehouses.warehouse_id', '=', 'warehouses.id')
            ->leftJoin('warehouse_translations', 'warehouses.id', '=', 'warehouse_translations.warehouse_id')
            ->where('warehouse_translations.locale', app()->getLocale())
            ->select('warehouses.*', 'warehouse_translations.name', 'app_warehouses.status')->get();
        $notImportedWarehouse = Warehouse::whereNotIn('id', AppWarehouses::all()->pluck('warehouse_id'))->get();
        if (!count($warehouse) && $q) abort(404);
        if ($q == null) {
            $q = count($warehouse) ? $warehouse[0]->id : null;
        }else{
            if(!AppWarehouses::where('warehouse_id',$q)->exists()){
                abort(404);
            }else{
                $current=AppWarehouses::where('warehouse_id',$q)->first();
            }
        }

        return $this->view('products.index', compact('warehouse','current', 'q', 'notImportedWarehouse'));
    }

    public function orders($q)
    {
        if (!AppWarehouses::where('warehouse_id', $q)->exists()) {
            abort(404);
        } else {
            $current = AppWarehouses::where('warehouse_id', $q)->first();
        }
        return $this->view('orders.index', compact('current', 'q'));
    }

    public function notSelectedProducts($id)
    {
       $items= Items::leftJoin('app_items','items.id','app_items.item_id')->
           where('warehouse_id',$id)->select('items.*','app_items.item_id')->get()->toArray();
       dd($items);
        $warehouse = Warehouse::findOrFail($id);
        $selecteds = $warehouse->appitems()->pluck('item_id');
        dd($selecteds);
        $items = Items::with(['brand', 'categories', 'translations'])->whereNotIn('id', $selecteds)->get();
        dd($items);
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

//    public function importShop(Request $request)
//    {
//        foreach ($request->get('warehouse', []) as $w) {
//            AppWarehouses::create(['warehouse_id' => $w]);
//        }
//        return redirect()->back();
//    }

    public function importShop($id)
    {
        AppWarehouses::create(['warehouse_id' => $id]);
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

    public function activateShop($id)
    {
        AppWarehouses::where('warehouse_id', $id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function draftShop($id)
    {
        AppWarehouses::where('warehouse_id', $id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function removeShop($id)
    {
        AppWarehouses::where('warehouse_id', $id)->delete();
        return redirect()->route('admin_app_products');
    }

    public function multiEditPrice(Request $request)
    {
        $items=$request->get('data');
        foreach ($items as $item){
            AppItems::where('id', $item['id'])->update(['price' => $item['price']]);
        }
        return response()->json(['error' => false]);

    }

    public function getSettings(Settings $settings, $q)
    {
        if (!AppWarehouses::where('warehouse_id', $q)->exists()) {
            abort(404);
        } else {
            $current = AppWarehouses::where('warehouse_id', $q)->first();
        }
        $settings = $settings->getEditableData('app_settings_' . $q)->toArray();
        return $this->view('settings', compact('current', 'q', 'settings'));
    }

    public function saveSettings(Request $request,Settings $settings)
    {
        $shop_id=$request->get('shop_id');
        $settings->updateOrCreateSettings('app_settings_'.$shop_id, $request->except('_token','shop_id'));
        return redirect()->back();
    }
}
