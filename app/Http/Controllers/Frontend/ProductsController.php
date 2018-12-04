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
        $categories = Category::with('children')->where('type','stocks')->whereNull('parent_id')->get();
        return $this->view('index', compact('categories'));
    }

    public function getType ($type,$category_slug = null)
    {
//        dd($category,$slug);
        $topCategory = Category::with('children')->where('slug',$type)->whereNull('parent_id')->first();

        if(! $topCategory) abort(404);

        $categories = $topCategory->children;
        $category = ((count($categories)) ? $categories->where('slug',$category_slug)->first() : null);

        if(! $category && $category_slug != null) abort(404);

        $attributes=Attributes::where('filter',1)->whereNull('parent_id')->with('children')->get();

        return $this->view('product_types',compact('attributes','categories','category','type'));
    }

    public function getSingle($type,$slug)
    {
        $vape=Stock::with(['variations','stockAttrs'])->where('slug',$slug)->first();

        if(! $vape) abort(404);

        $variations = $vape->variations()->with('options')->get();
        return $this->view('single',compact('vape','variations'));
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

    public function getJuice(Request $request,$slug = null)
    {
        $orderBy=$request->get('orderBy');
        $products = [];
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];
        $categories = Category::find(Category::JUICE_ID);
        $category = ($slug) ? Category::where('slug',$slug)->first() : ((count($categories->children)) ? $categories->children->first() : null);

        if($category){
            $products = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
                ->leftJoin('stock_categories', 'stocks.id', '=', 'stock_categories.stock_id')
                ->select('stocks.*', 'stock_translations.name')
                ->where('stock_translations.locale', app()->getLocale())
                ->where('type', 'JUE')
                ->where('status', true)
                ->where('stock_categories.categories_id', $category->id)
                ->orderBy($column, $direction)->get();
        }

        $attributes=Attributes::where('filter',1)->whereNull('parent_id')->with('children')->get();

        return $this->view('juice',compact('products','orderBy','attributes','categories','category'));
    }

    public function categoryJuice($id)
    {
//        $vape=Stock::findOrFail($id);
//        $variations = $vape->variations()->with('options')->get();
        return $this->view('category_juice');
    }

    public function singleJuice($slug,$id)
    {
        $vape=Stock::with(['variations','stockAttrs'])->findOrFail($id);
        $variations = $vape->variations()->with('options')->get();

        return $this->view('single_vape',compact('vape','variations'));
    }

    public function getPrice(Request $request)
    {
        $stock = Stock::find($request->uid);
        $attributes = [];
        $options = [];
        $totalCount = 0;
        if(is_array($request->options)){
            $attributes = array_keys($request->options);
            $options = array_values($request->options);
            $totalCount = count($request->options);
        }

        if($stock){
            $variation = null;
            if($stock->type == 'variation_product'){
                $option = StockVariationOption::select('*',\DB::raw('count(*) as total'))->whereIn('attributes_id',$attributes)
                    ->whereIn('options_id',$options)
                    ->whereIn('variation_id',$stock->variations()->pluck('id')->all())
                    ->groupBy('variation_id')
                    ->having('total',$totalCount)
                    ->orderBy('total','desc')->first();

                $variation = ($option && $option->variation) ? $option->variation : null;
            }elseif ($stock->type == 'simple_product'){
                $variation = $stock->variations->first();
            }elseif ($stock->type == 'package_product'){
                $variation = $stock->variations->first();
            }
            if($variation){
                if($variation->qty > 0){
                    if($request->promotion){
                        $promotionPrice = $stock->promotion_prices()->where('variation_id',$variation->id)->first();
                        $price = ($promotionPrice)? $promotionPrice->price : $variation->price;
                    }else{
                        $price = $variation->price;
                    }

                    return \Response::json(['price' =>  $price,'variation_id' =>$variation->variation_id ,'error' => false]);
                }else{
                    return \Response::json(['message' =>  'Out of stock','variation_id' =>$variation->variation_id ,'error' => true]);
                }
            }
        }

        return \Response::json(['message' =>  'See available options','error' => true]);
    }

    public function attachFavorite(Request $request)
    {
        $id=$request->get('id');
        $user=\Auth::user();
        $user->favorites()->attach($id);
        return ['error'=>false];
    }
    public function detachFavorite(Request $request)
    {
        $id=$request->get('id');
        $user=\Auth::user();
        $user->favorites()->detach($id);
        return ['error'=>false];
    }
}
