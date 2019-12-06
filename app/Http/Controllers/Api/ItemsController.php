<?php


namespace App\Http\Controllers\Api;


use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController
{
    public function getItems(Request $request)
    {
        $items=Items::where('status',1)->get();
       return response()->json($items);
    }

    public function getCategories(Request $request)
    {
        return  Category::whereNull('parent_id')->where('type', 'stocks')->get();
    }
}
