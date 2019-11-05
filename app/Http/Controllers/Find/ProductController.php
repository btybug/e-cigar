<?php

namespace App\Http\Controllers\Find;


use App\DataTables\ProductsDataTable;
use App\DataTables\ProductsDataTableEditor;
use App\Http\Controllers\Controller;
use App\Models\Barcodes;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        $categories = Category::where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name', 'id')->all();
        $brands = Category::where('type', 'brands')->whereNull('parent_id')->get()->pluck('name', 'id')->all();
        $data=request()->all();
        return $dataTable->render('admin.find.products.index',compact(['categories','brands','data']));
    }


    public function store(ProductsDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
