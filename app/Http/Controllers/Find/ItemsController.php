<?php

namespace App\Http\Controllers\Find;

use App\DataTables\ItemsDataTable;
use App\DataTables\ItemsDataTableEditor;
use App\Http\Controllers\Controller;
use App\Models\Barcodes;
use App\Models\Category;
use App\Models\Items;
use Google\Auth\Cache\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(ItemsDataTable $dataTable)
    {
        $categories = Category::where('type', 'stocks')->get()->pluck('name', 'id')->all();
        $brands = Category::where('type', 'brands')->get()->pluck('name', 'id')->all();
        $barcodes = Barcodes::all()->pluck('code', 'id');
        $data=collect(request()->all());
        return $dataTable->render('admin.find.items.index',compact(['categories','brands','barcodes','data']));
    }


    public function store(ItemsDataTableEditor $editor)
    {
        return $editor->process(request());
    }

    public function getBarcodes(Request $request){
        $barcodes=Items::leftJoin('barcodes','items.barcode_id','barcodes.id')->whereIn('items.id',$request->get('ids'))->select('barcodes.code')->get();
        return response()->json(['barcodes'=>$barcodes->pluck('code')]);
    }
}
