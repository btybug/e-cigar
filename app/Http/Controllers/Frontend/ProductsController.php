<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\AttributeStickers;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Stickers;
use App\Models\Stock;
use App\Models\StockVariationOption;
use App\ProductSearch\ProductSearch;
use View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view = 'frontend.products';

    public function index (Request $request,$type = null)
    {
        $category = Category::where('type','stocks')->whereNull('parent_id')->where('slug',$type)->first();
        if(! $category && $type != null) abort(404);

        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name','slug');
        $products = ProductSearch::apply($request,$category);
//        $products = ProductSearch::apply($request,$category,true);
//        dd($products);
        $filters = Attributes::where('filter',true)->get();

        $data =  $request->except('_token');
        $selecteds = [];
        if(isset($data['select_filter']) && count($data['select_filter'])){
            foreach ($data['select_filter'] as $k => $v){
                if($v && is_array($v)){
                    foreach ($v as $key => $value){
                        $attr = Attributes::getById($key);
                        $sticker = Stickers::getById($value);
                        $selecteds[$k.",".$value] = $sticker;
                    }
                }elseif ($v){
                    $sticker = Stickers::getById($v);
                    $attr = Attributes::getById($k);
                    $selecteds[$k] = $sticker;
                }
            }
        }

//        dd($data,$selecteds);

//        Stickers::getById()
//        $result = array_map('array_filter', $data);
//
//        dd($result, $request->except('_token'));
//        $count = array_map('count', $result);
//        $selectedData = array_sum($count);

        return $this->view('index', compact('categories','category','products','filters','selecteds'))->with('filterModel',$request->all());
    }

    public function getType ($type, $category_slug = null)
    {
//        dd($category,$slug);
        $topCategory = Category::with('children')->where('slug', $type)->whereNull('parent_id')->first();

        if (! $topCategory) abort(404);

        $categories = $topCategory->children;
        $category = ((count($categories)) ? $categories->where('slug', $category_slug)->first() : null);

        if (! $category && $category_slug != null) abort(404);

        $attributes = Attributes::where('filter', 1)->whereNull('parent_id')->with('children')->get();

        return $this->view('product_types', compact('attributes', 'categories', 'category', 'type'));
    }

    public function getSingle ($type, $slug)
    {
        $vape = Stock::with(['variations', 'stockAttrs'])->where('slug', $slug)->first();
        if (! $vape) abort(404);

        $variations = $vape->variations()->with('options')->get();

        return $this->view('single', compact(['vape', 'variations']));
    }


    public function getVape (Request $request)
    {
        $orderBy = $request->get('orderBy');
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];

        $products = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
            ->where('stock_translations.locale', app()->getLocale())
            ->where('type', 'DEV')
            ->where('status', true)
            ->select('stocks.*', 'stock_translations.name')
            ->orderBy($column, $direction)->paginate(5);
        $attributes = Attributes::where('filter', 1)->whereNull('parent_id')->with('children')->get();

        return $this->view('vapes', compact('products', 'orderBy', 'attributes'));
    }

    public function singleVape ($id)
    {
        $vape = Stock::findOrFail($id);
        $variations = $vape->variations()->with('options')->get();

        return $this->view('single_vape', compact('vape', 'variations'));
    }

    public function getJuice (Request $request, $slug = null)
    {
        $orderBy = $request->get('orderBy');
        $products = [];
        $orderByArray = explode(',', $request->get('orderBy', 'id,DESC'));
        $column = $orderByArray[0];
        $direction = $orderByArray[1];
        $categories = Category::find(Category::JUICE_ID);
        $category = ($slug) ? Category::where('slug', $slug)->first() : ((count($categories->children)) ? $categories->children->first() : null);

        if ($category) {
            $products = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
                ->leftJoin('stock_categories', 'stocks.id', '=', 'stock_categories.stock_id')
                ->select('stocks.*', 'stock_translations.name')
                ->where('stock_translations.locale', app()->getLocale())
                ->where('type', 'JUE')
                ->where('status', true)
                ->where('stock_categories.categories_id', $category->id)
                ->orderBy($column, $direction)->get();
        }

        $attributes = Attributes::where('filter', 1)->whereNull('parent_id')->with('children')->get();

        return $this->view('juice', compact('products', 'orderBy', 'attributes', 'categories', 'category'));
    }

    public function categoryJuice ($id)
    {
//        $vape=Stock::findOrFail($id);
//        $variations = $vape->variations()->with('options')->get();
        return $this->view('category_juice');
    }

    public function singleJuice ($slug, $id)
    {
        $vape = Stock::with(['variations', 'stockAttrs'])->findOrFail($id);
        $variations = $vape->variations()->with('options')->get();

        return $this->view('single_vape', compact('vape', 'variations'));
    }

    public function getPrice (Request $request)
    {
        $stock = Stock::find($request->uid);
        $attributes = [];
        $options = [];
        $totalCount = 0;
        if (is_array($request->options)) {
            $attributes = array_keys($request->options);
            $options = array_values($request->options);
            $totalCount = count($request->options);
        }

        if ($stock) {
            $variation = null;
            if ($stock->type == 'variation_product') {
                $option = StockVariationOption::select('stock_variation_options.*', \DB::raw('count(*) as total'))
                    ->leftJoin('attributes_stickers','stock_variation_options.attribute_sticker_id','attributes_stickers.id')
                    ->whereIn('attributes_stickers.attributes_id', $attributes)
                    ->whereIn('attributes_stickers.sticker_id', $options)
                    ->whereIn('variation_id', $stock->variations()->pluck('id')->all())
                    ->groupBy('variation_id')
                    ->having('total', $totalCount)
                    ->orderBy('total', 'desc')->first();
                $variation = ($option && $option->variation) ? $option->variation : null;
            } elseif ($stock->type == 'simple_product') {
                $variation = $stock->variations->first();
            } elseif ($stock->type == 'package_product') {
                $variation = $stock->variations->first();
            }
            if ($variation) {
                if ($request->promotion) {
                    $promotionPrice = $stock->promotion_prices()->where('variation_id', $variation->id)->first();
                    $price = ($promotionPrice) ? $promotionPrice->price : $variation->price;
                } else {
                    $price = $variation->price;
                }
                $isFavorite = false;

                if(\Auth::check()) {
                    $isFavorite = \Auth::user()->favorites()->where('favorites.variation_id',$variation->id)->first();
                }

                if ($variation->qty > 0) {
                    return \Response::json(['price' => convert_price($price,get_currency()), 'variation_id' => $variation->id, 'error' => false,'isFavorite' => $isFavorite]);
                } else {
                    return \Response::json(['message' => 'Out of stock', 'price' => convert_price($price,get_currency()), 'variation_id' => $variation->id, 'error' => false,'isFavorite' => $isFavorite]);
                }
            }
        }

        return \Response::json(['message' => 'See available options', 'error' => true]);
    }


}
