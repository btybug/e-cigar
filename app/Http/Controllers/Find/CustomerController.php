<?php

namespace App\Http\Controllers\Find;

use App\DataTables\ItemsDataTable;
use App\DataTables\ItemsDataTableEditor;
use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTableEditor;
use App\Http\Controllers\Controller;
use App\Models\Barcodes;
use App\Models\Category;

class CustomerController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {

        $data=request()->all();
        return $dataTable->render('admin.find.customers.index',compact(['data']));
    }


    public function store(UsersDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
