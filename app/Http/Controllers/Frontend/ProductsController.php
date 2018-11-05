<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Stock;
use App\Models\StockVariationOption;
use View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view = 'frontend.products';

    public function index()
    {
        $posts = Posts::all();
        return $this->view('index', compact('posts'));
    }



    public function getVape(Request $request)
    {
        $orderBy=$request->get('orderBy');
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];

        $products = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->where('stock_translations.locale', app()->getLocale())
            ->where('type', 'DEV')
            ->where('status', true)
            ->select('stocks.*', 'stock_translations.name')
            ->orderBy($column, $direction)->paginate(5);
        $attributes=Attributes::where('filter',1)->whereNull('parent_id')->with('children')->get();
        return $this->view('vapes', compact('products','orderBy','attributes'));
    }

    public function singleVape($id)
    {
        $vape=Stock::findOrFail($id);
        $variations = $vape->variations()->with('options')->get();
        return $this->view('single_vape',compact('vape','variations'));
    }

    public function getJuice(Request $request,$category_id = null)
    {
        $orderBy=$request->get('orderBy');
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];
        $categories = Category::find(Category::JUICE_ID);
        $category = ($category_id) ? Category::find($category_id) : ((count($categories->children)) ? $categories->children->first() : null);

        $products = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->where('stock_translations.locale', app()->getLocale())
            ->where('type', 'JUE')
            ->where('status', true)
            ->select('stocks.*', 'stock_translations.name')
            ->orderBy($column, $direction)->paginate(5);

        $attributes=Attributes::where('filter',1)->whereNull('parent_id')->with('children')->get();

        return $this->view('juice',compact('products','orderBy','attributes','categories','category'));
    }

    public function categoryJuice($id)
    {
//        $vape=Stock::findOrFail($id);
//        $variations = $vape->variations()->with('options')->get();
        return $this->view('category_juice');
    }

    public function singleJuice($id)
    {
        $vape=Stock::findOrFail($id);
        $variations = $vape->variations()->with('options')->get();
        return $this->view('single_juice',compact('vape','variations'));
    }

    public function getPrice(Request $request)
    {
        $stock = Stock::find($request->uid);
        $attributes = array_keys($request->options);
        $options = array_values($request->options);
        if($stock){
            $option = StockVariationOption::select('*',\DB::raw('count(*) as total'))->whereIn('attributes_id',$attributes)->whereIn('options_id',$options)
                ->whereIn('variation_id',$stock->variations()->pluck('id')->all())->groupBy('variation_id')->orderBy('total','desc')->first();

            if($option && $option->variation){
                return \Response::json(['price' =>  $option->variation->price,'variation_id' =>$option->variation->variation_id ,'error' => false]);
            }
        }


        return \Response::json(['message' =>  'Currently product unavailable','error' => true]);
    }
}
