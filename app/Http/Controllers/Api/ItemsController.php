<?php


namespace App\Http\Controllers\Api;


use App\Models\App\AppItems;
use App\Models\Category;
use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ItemsController
{
    public function getItems(Request $request)
    {
        $w_id = $request->get('shop_id');
        $warehouse=Warehouse::findOrFail($w_id);
        $rack=$warehouse->default_rack();
        $items = AppItems::join('items', 'app_items.item_id', '=', 'items.id')
            ->leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->leftJoin('categories', 'items.brand_id', '=', 'categories.id')
            ->leftJoin('categories_translations', 'categories.id', '=', 'categories_translations.category_id')
            ->leftJoin('item_locations', 'items.id', '=', 'item_locations.item_id')
            ->leftJoin('barcodes', 'items.barcode_id', '=', 'barcodes.id')
            ->select(
                'items.barcode_id',
                'app_items.id',
                'items.brand_id',
                'app_items.status',
                'app_items.price',
                'app_items.created_at',
                'app_items.item_id',
                'item_translations.name',
                'item_translations.short_description',
                'item_translations.long_description',
                'barcodes.code',
                'categories_translations.name as category',
                \DB::raw('SUM(DISTINCT  item_locations.qty) as qty')
            )
            ->groupBy('items.id')
            ->where('app_items.warehouse_id', $w_id)
            ->where('item_locations.warehouse_id', $w_id)
            ->where('items.is_archive', false)->with('item')
            ->where('item_translations.locale', \Lang::getLocale())->get();
        return response()->json($items);
    }

    public function getCategories(Request $request)
    {
        return  Category::whereNull('parent_id')->where('type', 'stocks')->get();
    }
}
