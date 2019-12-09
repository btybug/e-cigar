<?php


namespace App\Http\Controllers\Api;


use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController
{
    public function getItems(Request $request)
    {
        $w_id = $request->get('shop_id');
        $items = Items::leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->leftJoin("item_locations", "items.id", "=", "item_locations.item_id")
            ->where("item_locations.warehouse_id", "=", $w_id)->get();

        return response()->json($items);
    }

    public function getCategories(Request $request)
    {
        return  Category::whereNull('parent_id')->where('type', 'stocks')->get();
    }
}
