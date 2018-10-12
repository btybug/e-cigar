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
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $view = 'admin.store';

    public function index()
    {
        return $this->view('index');
    }

    public function newProduct()
    {
        return $this->view('new');
    }

    public function getCategories()
    {
        $categories = Category::whereNull('parent_id')->get();
        $allCategories = Category::all();
        $model = Category::find(1);
        return $this->view('categories.index',compact('categories','model','allCategories'));
    }

    public function postCreateOrUpdateCategory(Request $request)
    {
        Category::updateOrCreate($request->id, $request->except('_token','translatable'));
        return redirect()->back();
    }


}