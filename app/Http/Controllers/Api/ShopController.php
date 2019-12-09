<?php


namespace App\Http\Controllers\Api;


use App\Models\RackItems;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ShopController
{
    public function getUser(Request $request)
    {
        $shop_id=$request->get('shop_id',1);
        $items =RackItems::join('racks','rack_items.rack_id','racks.id')
            ->join('shops','racks.shop_id','=','shops.id')
            ->join('items','rack_items.item_id','=','items.id')
            ->where('shops.id',$shop_id)
            ->where('racks.is_default',1)
            ->select('items.id', 'items.price', 'items.item_id', 'rack_items.qty', 'rack_items.id as rack')
            ->get();


        return response()->json($items);
    }

    public function getShop(Request $request)
    {
        return Warehouse::all()->pluck('name', 'id');
    }
}
