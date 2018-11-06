<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CouponsRequest;
use App\Http\Requests\ShippingZonePost;
use App\Http\Requests\StoreCategoryPost;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Coupons;
use App\Models\Products;
use App\Models\Settings;
use App\Models\ShippingZones;
use Carbon\Carbon;
use DB;
use PragmaRX\Countries\Package\Countries;
use Lang;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $view = 'admin.tools.categories';

    public function list()
    {
        return $this->view('list');
    }

    public function getCategories()
    {
        $categories = Category::whereNull('parent_id')->get();
        $allCategories = Category::all();
        enableMedia();
        return $this->view('index',compact('categories','model','allCategories'));
    }

    public function getPostCategories()
    {
        $categories = CategoryPost::whereNull('parent_id')->get();
        $allCategories = CategoryPost::all();
        enableMedia();
        return $this->view('post.index',compact('categories','model','allCategories'));
    }

    public function postCategoryForm (Request $request)
    {
        $id = $request->get('id',0);
        $model = Category::find($id);
        $allCategories = Category::where('id','!=',$id)->get();
        $html = $this->view("create_or_update",compact(['allCategories','model']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postCategoryPostForm (Request $request)
    {
        $id = $request->get('id',0);
        $model = CategoryPost::find($id);
        $allCategories = CategoryPost::where('id','!=',$id)->get();
        $html = $this->view("post.create_or_update",compact(['allCategories','model']))->render();

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

    public function postCategoryPostUpdateParent (Request $request)
    {
        $model = CategoryPost::find($request->get('id'));
        if($model){
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreateOrUpdateCategory(StoreCategoryPost $request)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Category::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function postCreateOrUpdateCategoryPost(StoreCategoryPost $request)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        CategoryPost::updateOrCreate($request->id, $data);
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

    public function postDeleteCategoryPost (Request $request)
    {
        $model = CategoryPost::find($request->get('id'));
        if($model){
            $model->delete();
        }

        return redirect()->back();
    }

    public function getCategory(Request $request)
    {
        $lang = Lang::getLocale();
        return Category::LeftJoin('categories_translations', 'categories.id', '=', 'categories_translations.category_id')
            ->select('categories.*', 'categories_translations.name')
            ->where('categories_translations.name', 'like', '%' . $request->get('q') . '%')
            ->where('categories_translations.locale',$lang)
            ->get();
    }
}