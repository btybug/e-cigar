<?php


namespace App\Http\Controllers\Admin\App;


use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $view = 'admin.app';

    public function products(Request $request,$id=null)
    {
        $warehouse=Warehouse::all();
        $q=($id)??$warehouse[0]->id;
        $warehouse=$warehouse->pluck('name','id');
        return $this->view('products.index',compact('warehouse','q'));
    }

    public function orders(Request $request,$id=null)
    {
        $warehouse=Warehouse::all();
        $q=($id)??$warehouse[0]->id;
        $warehouse=$warehouse->pluck('name','id');
        return $this->view('orders.index',compact('warehouse','q'));
    }
}
