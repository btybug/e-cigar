<?php

namespace App\Http\Controllers;

use App\DataTables\ItemsDataTable;
use App\DataTables\ItemsDataTableEditor;
use App\Models\Barcodes;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(ItemsDataTable $dataTable)
    {
        $categories = Category::where('type', 'stocks')->get()->pluck('name', 'id')->all();
        $brands = Category::where('type', 'brands')->whereNull('parent_id')->get()->pluck('name', 'id')->all();
        $barcodes = Barcodes::all()->pluck('code', 'id');
        $data=request()->all();
        return $dataTable->render('admin.find.items.index',compact(['categories','brands','barcodes','data']));
    }


    public function store(ItemsDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
