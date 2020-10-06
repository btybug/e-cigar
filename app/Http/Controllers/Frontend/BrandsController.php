<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    protected $view = 'frontend.brands';

    public function index()
    {
        $brands = Brands::all();
        return $this->view('index', compact('brands'));
    }

    public function single($slug)
    {
        $brands = Brands::all();
        if (!$brands->count()) abort(404);
        $slug = ($slug) ? $slug : $brands->first()->slug;
        $current = ($slug) ? Brands::where('slug', $slug)->firstOrFail() : null;
        $products = ($current) ? $current->products() : collect([]);

        $categories = Category::where('type', 'stocks')->whereNull('parent_id')->get();

        $stockCategories = Category::withTranslation()->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name', 'slug');

        $f = false;

        $products = $products->leftJoin('stock_categories', 'stock_categories.stock_id', '=', 'stocks.id')
            ->leftJoin('categories', 'stock_categories.categories_id', '=', 'categories.id');
        if (!$f) {
            $products = $products->select('stocks.*')->groupBy('stocks.id')->get();
        } else {
            $products = $products->where('categories.slug', $f)->select('stocks.*')->groupBy('stocks.id')->get();
        }

        $settings = new Settings();
        $sliders = $settings->getEditableData('brands');

        return $this->view('single', compact('brands', 'slug', 'current', 'products', 'categories', 'stockCategories', 'f', 'sliders'));
    }

    public function postBrand(Request $request)
    {
        $current = Brands::findOrFail($request->id);

        $products = $current->products();
        $stockCategories = Category::withTranslation()->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name', 'slug');

        $f = false;
        $products = ($f) ? $products->leftJoin('stock_categories', 'stock_categories.stock_id', '=', 'stocks.id')
            ->leftJoin('categories', 'stock_categories.categories_id', '=', 'categories.id')
            ->where('categories.slug', $f)->select('stocks.*')->groupBy('stocks.id')->get() : $products->get();
        $html = view("frontend.brands._partials.current", compact('current', 'products', 'stockCategories', 'f'))->render();
        return response()->json(['error' => false, 'html' => $html]);
    }

    public function postCategoryProducts(Request $request)
    {
        $current = Brands::findOrFail($request->id);

        $products = $current->products();
        $stockCategories = Category::withTranslation()->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name', 'slug');

        $f = isset($stockCategories[$request->slug]) ? $request->slug : false;
        $orderFilter = static::generateOrderBy($request->get('sortBy', null));

        $products = $products->leftJoin('stock_categories', 'stock_categories.stock_id', '=', 'stocks.id')
            ->leftJoin('categories', 'stock_categories.categories_id', '=', 'categories.id');
        if (!$f) {
            $products = $products->select('stocks.*')->groupBy('stocks.id')->orderBy($orderFilter[0], $orderFilter[1])->get();
        } else {
            $products = $products->where('categories.slug', $f)->select('stocks.*')->groupBy('stocks.id')->orderBy($orderFilter[0], $orderFilter[1])->get();
        }
        $html = view('frontend.brands._partials.products', compact('current', 'products', 'stockCategories', 'f'))->with([
            'sortBy' => $request->get('sortBy', null)
        ])->render();
        return response()->json(['error' => false, 'html' => $html]);
    }

    private static function generateOrderBy(?string $orderBy)
    {
        switch ($orderBy) {
            case "newest":
                $defaultCol = 'created_at';
                $ordering = 'desc';
                break;
            case "oldest":
                $defaultCol = 'created_at';
                $ordering = 'asc';
                break;
            default:
                $defaultCol = 'created_at';
                $ordering = 'desc';
        }

        return [$defaultCol, $ordering];
    }

    public function postBrandProducts(Request $request)
    {
        $parent = Brands::findOrFail($request->id);

        if ($parent) {
            $stockCategories = $parent->children;
        } else {
            $stockCategories = Brands::all();
        }

        $current = ($stockCategories && count($stockCategories)) ? $stockCategories->first() : null;
        $products = ($current) ? $current->products() : collect([]);
        $f = ($current) ? $current->id : null;
        $html = view('frontend.brands._partials.current', compact('current', 'products', 'f'))
            ->with('stockCategories', $stockCategories->pluck('name', 'slug'))->render();
        $list = view("frontend.brands._partials.list", compact(['current']))->with('brands', $stockCategories)->render();

        return response()->json(['error' => false, 'html' => $html, 'list' => $list]);
    }

}

