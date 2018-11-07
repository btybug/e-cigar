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

    public function getCategories($type)
    {
        $categories = Category::whereNull('parent_id')->where('type',$type)->get();
        $allCategories = Category::where('type',$type)->get();
        enableMedia();
        return $this->view('index',compact('categories','model','allCategories','type'));
    }

    public function postCategoryForm (Request $request,$type)
    {
        $id = $request->get('id',0);
        $model = Category::where('id',$id)->where('type',$type)->first();

        $allCategories = Category::where('id','!=',$id)->where('type',$type)->get();
        $html = $this->view("create_or_update",compact(['allCategories','model','type']))->render();

        return \Response::json(['error' => false,'html' => $html]);
    }

    public function postCategoryUpdateParent (Request $request,$type)
    {
        $model = Category::where('id',$request->get('id'))->where('type',$type)->first();
        if($model){
            $model->parent_id = $request->get('parentId');
            $model->save();
        }

        return \Response::json(['error' => false]);
    }

    public function postCreateOrUpdateCategory(StoreCategoryPost $request,$type)
    {
        $data = $request->except('_token','translatable');
        $data['user_id'] = \Auth::id();
        Category::updateOrCreate($request->id, $data);
        return redirect()->back();
    }

    public function postDeleteCategory (Request $request,$type)
    {
        $model = Category::find($request->get('id'));
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