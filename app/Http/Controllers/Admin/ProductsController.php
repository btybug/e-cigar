<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\User;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view = 'admin.store.products';

    public function index()
    {
        return $this->view('index');
    }

    public function newProduct()
    {
        $model = new Products();
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        return $this->view('new',compact('authors','model'));
    }

    public function postNewProduct(Request $request)
    {
        $data = $request->except('_token','translatable','product_discount');
        Products::updateOrCreate($request->id, $data);

        return redirect()->route('admin_store');
    }

    public function getEdit($id)
    {
        $model = Products::findOrFail($id);
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        return $this->view('new',compact('authors','model'));
    }
}