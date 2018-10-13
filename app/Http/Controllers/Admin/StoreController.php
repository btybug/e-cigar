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

        return $this->view('categories.index',compact('categories','model','allCategories'));
    }

    public function postCategoryForm (Request $request)
    {
        $id = $request->get('id',0);
        $model = Category::find($id);
        $allCategories = Category::where('id','!=',$id)->get();
        $html = \View("admin.store.categories.create_or_update",compact(['allCategories','model']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postCategoryUpdateParent (Request $request)
    {
        $model = Category::find($request->get('id'));
        if($model){
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreateOrUpdateCategory(Request $request)
    {
//        dd($request->all());
        Category::updateOrCreate($request->id, $request->except('_token','translatable'));
        return redirect()->back();
    }

    public function postDeleteCategory (Request $request)
    {
        $model = Category::find($request->get('id'));
        if($model){
            $model->delete();
        }

        return redirect()->back();
    }


}