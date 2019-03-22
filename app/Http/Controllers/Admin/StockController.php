<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 2/18/2019
 * Time: 2:42 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Items;
use App\Models\Settings;
use App\Models\Stickers;
use App\Models\Stock;
use App\Models\StockSeo;
use App\Services\StockService;
use Illuminate\Http\Request;

class StockController extends Controller
{
    protected $view = 'admin.stock';

    private $stockService;
    private $settings;

    public function __construct(StockService $stockService, Settings $settings)
    {
        $this->stockService = $stockService;
        $this->settings = $settings;
    }

    public function stock()
    {
        return $this->view('stock');
    }

    public function stockNew()
    {
        $model = null;
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $data = Category::recursiveItems($categories);
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $stockItems = Items::all()->pluck('name', 'id')->all();

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');

        return $this->view('stock_new', compact(['model', 'data', 'categories', 'general', 'allAttrs', 'twitterSeo', 'fbSeo', 'robot', 'stockItems']));
    }

    public function getStockEdit($id)
    {
        $model = Stock::findOrFail($id);
        $variations = collect($model->variations)->groupBy('variation_id');

        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $checkedCategories = $model->categories()->pluck('id')->all();
        $data = Category::recursiveItems($categories, 0, [], $checkedCategories);
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $stockItems = Items::all()->pluck('name', 'id')->all();

        $general = $this->settings->getEditableData('seo_stocks')->toArray();
        $twitterSeo = $this->settings->getEditableData('seo_twitter_stocks')->toArray();
        $fbSeo = $this->settings->getEditableData('seo_fb_stocks')->toArray();
        $robot = $this->settings->getEditableData('seo_robot_stocks');

        return $this->view('stock_new', compact(['model','variations','checkedCategories', 'categories', 'allAttrs', 'general', 'stockItems', 'twitterSeo', 'fbSeo', 'robot', 'data']));
    }

    public function postStock(ProductsRequest $request)
    {
//        dd($request->get('variations', []));
        $data = $request->except('_token', 'translatable', 'options', 'promotions', 'specifications',
            'variations', 'variation_single', 'package_variation_price', 'package_variation_count_limit' ,'package_variation', 'extra_product', 'promotion_prices', 'promotion_type',
            'categories', 'general', 'related_products', 'stickers', 'fb', 'twitter', 'general', 'robot', 'type_attributes', 'type_attributes_options');
        $data['user_id'] = \Auth::id();
//        dd($request->get('promotions'),array_values($request->get('promotions')));
        $stock = Stock::updateOrCreate($request->id, $data);

//        if ($data['type'] == 'variation_product') {
//            $this->stockService->saveVariations($stock, $request->get('variations', []));
//        } elseif ($data['type'] == 'simple_product') {
//            $this->stockService->saveSingleVariation($stock, $request->get('variation_single', []));
//        } elseif ($data['type'] == 'package_product') {
//            $this->stockService->savePackageVariation($stock, $request->get('package_variation', []));
//        }

        $this->stockService->savePackageVariation($stock, $request->get('variations', []));

        $this->stockService->makeTypeOptions($stock, $request->get('type_attributes', []));
        $stock->specifications()->sync($request->get('specifications'));
        $options = $this->stockService->makeOptions($stock, $request->get('options', []));
        $stock->specifications()->syncWithoutDetaching($options);


        //-------------------//
        $stock->categories()->sync(json_decode($request->get('categories', [])));
        $stock->related_products()->sync($request->get('related_products'));

        $stock->promotions()->detach();

        if ($request->promotions && count($request->promotions)) {
            foreach ($request->promotions as $promotion) {
                $stock->promotions()->attach($promotion['id'], ['type' => $promotion['type']]);
            }
        }

        $stock->stickers()->sync($request->get('stickers'));
        $this->stockService->savePromotionPrices($stock, $request->get('promotion_prices', []));

        $this->createOrUpdateSeo($request, $stock->id);

        //-------------------//
        return redirect()->back();
    }

    public function getPromotionEdit($id, Request $request)
    {
        $model = Stock::findOrFail($id);
        $type = $request->get('type', 'all');
        $now = strtotime(today()->toDateString());

        if ($type == 'all') {
            $sales = $model->sales()->groupBy('slug')->get();
        } else if ($type == 'archived') {
            $sales = $model->sales()->where('canceled', true)->groupBy('slug')->get();
        } else if ($type == 'coming') {
            $sales = $model->sales()->where('canceled', false)->where('start_date', '>', $now)->groupBy('slug')->get();
        } else if ($type == 'current') {
            $sales = $model->sales()->where('canceled', false)->where('start_date', '<=', $now)->where('end_date', '>=', $now)->groupBy('slug')->get();
        }

        return $this->view('stock_promotions', compact(['model', 'sales', 'type']));

    }

    public function getPromotionVariations(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        $model = Stock::findOrFail($request->id);
        $type = $request->type;
        $price = json_decode($request->price, true);
//        dd($price);

        $html = \View("admin.inventory._partials.extra_item", compact(['model', 'type', 'price', 'stock']))->render();
//        dd($html);
//        dd(\Response::json(['error' => false, 'html' => $html]));
        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function savePromotion(Request $request)
    {
        $data = $request->except('extra_product', 'stock_id');
        $stock = Stock::findOrFail($request->stock_id);

        $sale = $stock->sales()->where('canceled', false)->where('start_date', '<=', strtotime($data['start_date']))->where('end_date', '>=', strtotime($data['start_date']))
            ->orWhere(function ($query) use ($data) {
                $query->where('canceled', false)->where('start_date', '<=', strtotime($data['end_date']))->where('end_date', '>=', strtotime($data['end_date']));
            })
            ->first();

        if ($sale) return \Response::json(['error' => true, 'message' => 'Please select another dates for promotion, we have active promotion with these dates...']);

        if ($request->get('extra_product') && count($request->get('extra_product'))) {
            foreach ($request->get('extra_product') as $key => $item) {
                $sale = $stock->sales()->where('variation_id', $key)->where('slug', $data['slug'])->first();
                $data['variation_id'] = $key;
                $data['price'] = $item['price'];
                if ($sale) {
                    $sale->update($data);
                } else {
                    $stock->sales()->create($data);
                }
            }
        }

        return \Response::json(['error' => false]);
    }

    private function createOrUpdateSeo($request, $stock_id)
    {
        $types = $request->only(['fb', 'general', 'twitter', 'robot']);
        foreach ($types as $type => $data) {
            foreach ($data as $name => $value) {
                $seo = StockSeo::firstOrNew(['stock_id' => $stock_id, 'name' => $name, 'type' => $type]);
                if ($value) {
                    $seo->content = $value;
                    $seo->save();
                } else {
                    $seo->delete();
                }
            }
        }
    }

    public function cancelSale(Request $request)
    {
        $stock = Stock::findOrFail($request->stock_id);
        $stock->sales()->where('slug', $request->slug)->update(['canceled' => true]);

        return \Response::json(['error' => false]);
    }

    public function linkAll($data)
    {
        $results = [];
        if ($data && count($data)) {
            $firstKeyArray = array_first($data);
            array_shift($data);
            foreach ($data as $i => $v) {
                $notFullCount = count($firstKeyArray);
                foreach ($firstKeyArray as $phrase) {
                    foreach ($data[$i] as $newPart) {
                        $firstKeyArray[] = $phrase . "-" . $newPart;
                    }
                }
                $firstKeyArray = array_slice($firstKeyArray, $notFullCount);
            }


            if (count($firstKeyArray)) {
                foreach ($firstKeyArray as $string) {
                    $results[] = explode('-', $string);
                }
            }
        }

        return $results;
    }

    public function variationForm(Request $request)
    {
        $data = $request->get('data');
        $model = null;
        $html = \View('admin.inventory._partials.variation_form', compact(['model', 'data']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addVariation(Request $request)
    {
        $item = $request->except('_token');
        $stockItems = Items::all()->pluck('sku', 'sku')->all();
        $html = \View('admin.inventory._partials.variation_item', compact(['item', 'stockItems']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addPackageVariation(Request $request)
    {
        $items = Items::whereIn('id',$request->items)->get();
        $main_unique = $request->get('main_unique');
        $stockItems = Items::all()->pluck('name', 'id')->all();
        $package_variation = null;
        $main = null;
        $html = \View("admin.items._partials.variation_package_item", compact(['package_variation', 'stockItems','main_unique','main','items']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function duplicatePackageOptions(Request $request)
    {
        $stockItems = Items::all()->pluck('name', 'id')->all();
        $package_variation = null;
        $model = null;
        $html = \View('admin.stock._partials.package_item', compact(['model','package_variation', 'stockItems']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function duplicateVOptions(Request $request)
    {
        $stockItems = Items::all()->pluck('name', 'id')->all();
        $package_variation = null;
        $model = null;
        $html = \View('admin.stock._partials.variation', compact(['model','package_variation', 'stockItems']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function editVariation(Request $request)
    {
        $data = $request->get('data');
        $model = $request->get('model');
        $variationId = $request->get('variationId');
        $html = \View('admin.inventory._partials.variation_form', compact(['model', 'data', 'variationId']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getOptionById(Request $request)
    {
        $selected = Attributes::find($request->id);
        $allAttrs = Attributes::with('stickers')->whereNull('parent_id')->get();
        $html = \View("admin.inventory._partials.variation_option_item", compact(['selected', 'allAttrs']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getSpecification(Request $request)
    {
        $selected = Attributes::find($request->id);
        $allAttrs = Attributes::with('stickers')->whereNull('parent_id')->get();
        $html = \View("admin.inventory._partials.specifications", compact(['selected', 'allAttrs']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postRenderVariationNewOptions(Request $request)
    {
        $attributesJson = $request->get('attributesJson');
        $objData = $request->get('objData');
        $variation = $request->get('variation');
        $html = \View("admin.inventory._partials.variation_item_render_new_options", compact(['attributesJson', 'objData', 'variation']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getById(Request $request)
    {
        $model = Stock::findOrFail($request->id);

        return \Response::json(['error' => false, 'data' => $model]);
    }

    public function getVariationsById(Request $request)
    {
        $model = Stock::find($request->id);

        if (!$model) return \Response::json(['error' => true, 'message' => 'Not found']);

        return \Response::json(['error' => false, 'data' => $model->variations]);
    }

    public function addExtraOption(Request $request)
    {
        $option = $request->except('_token');
        $html = \View("admin.inventory._partials.extra_item", compact(['option']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function saveExtraOptions(Request $request)
    {
        return \Response::json(['error' => false, 'data' => json_encode($request->data, true)]);
    }

    public function getStocks(Request $request)
    {
        $promotion = ($request->get("promotion")) ? true : false;
        $attr = Stock::whereNotIn('id', $request->get('arr', []))->get();

        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function postItemByID(Request $request)
    {
        $item = Items::findOrFail($request->id);

        return \Response::json(['error' => false, 'data' => $item]);
    }

    public function postSelectItems(Request $request)
    {
        $items = Items::whereNotIn('id', $request->get('items', []))->get();
        $uniqueId = $request->get('uniqueId');
        $stickers = array_filter(Stickers::all()->pluck('name', 'id')->all());

        $html = \view("admin.stock._partials.select_items",compact(['items','uniqueId','stickers']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postSearchItems(Request $request)
    {
        $items = Items::leftJoin('item_specifications','items.id','item_specifications.item_id')
            ->whereNotIn('items.id', $request->get('items', []))
            ->whereIn('item_specifications.sticker_id',$request->get('stickers',[]))
            ->select('items.*')->get();
//        $items = Items::whereNotIn('id', $request->get('items', []))->get();

        $html = \view("admin.stock._partials.items_render",compact(['items']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }
}
