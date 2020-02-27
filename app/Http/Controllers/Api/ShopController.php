<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\App\AppWarehouses;
use App\Models\RackItems;
use App\Models\Settings;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ShopController extends Controller
{
//    public function getUser(Request $request)
//    {
//        $shop_id=$request->get('shop_id',1);
//        $items =RackItems::join('racks','rack_items.rack_id','racks.id')
//            ->join('shops','racks.shop_id','=','shops.id')
//            ->join('items','rack_items.item_id','=','items.id')
//            ->where('shops.id',$shop_id)
//            ->where('racks.is_default',1)
//            ->select('items.id', 'items.price', 'items.item_id', 'rack_items.qty', 'rack_items.id as rack')
//            ->get();
//
//
//        return response()->json($items);
//    }
    public function getUser(Request $request)
    {
        return $request->user();
    }
    public function getShop(Request $request)
    {
        return  AppWarehouses::join('warehouses','app_warehouses.warehouse_id','=','warehouses.id')
            ->leftJoin('warehouse_translations','warehouses.id','=','warehouse_translations.warehouse_id')
            ->where('app_warehouses.status',1)
            ->where('warehouse_translations.locale',app()->getLocale())
            ->select('warehouses.id','warehouse_translations.name')->pluck('name', 'id');

    }

    public function getSettings(Request $request,Settings $settings)
    {
        $shop_id=$request->get('shop_id');
        $model=$settings->getEditableData('app_settings_'.$shop_id);
        return response()->json(['settings'=>$model]);
    }

    public function getStaffMembers(Request $request)
    {
        $warehouse=Warehouse::findOrFail($request->get('shop_id'));
         return response()->json(['success'=>true,'members'=>$warehouse->staff]);
    }
}
