<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class DatatableController extends Controller
{
    public function getAllUsers()
    {

        return Datatables::of(User::query())
            ->make(true);
    }

    public function getAllCategories()
    {
        return Datatables::of(Category::query())
            ->make(true);
    }
}
