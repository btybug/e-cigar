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
use App\Models\Stock;
use App\Services\StockService;
use App\User;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $view = 'admin.store.products';

    private $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function index()
    {
        return $this->view('index');
    }

    public function newProduct()
    {
        $model = new Products();
        $stocks = Stock::get()->pluck('name','id')->toArray();
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        return $this->view('new',compact('authors','model','stocks'));
    }

    public function postNewProduct(Request $request)
    {
        $data = $request->except('_token','translatable','attributes', 'options', 'variations','variation_options','product_discount');
        $product = Products::updateOrCreate($request->id, $data);
        $product->attrs()->sync($request->get('attributes'));
        $options = $this->stockService->makeProductOptions($product, $request->get('options',[]));
        $product->attrs()->syncWithoutDetaching($options);

        $this->stockService->saveProductVariations($product, $request->get('variations',[]),$request->get('variation_options',[]));

        return redirect()->route('admin_store');
    }

    public function getEdit($id)
    {
        $model = Products::findOrFail($id);
//        $a = $model->forRender();
//        dd($a);
        $stocks = Stock::get()->pluck('name','id')->toArray();
        $attrs = $model->attrs()->with('children')->where('attributes.parent_id', null)->get();
        $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
        $variations = $model->variations()->with('options')->get();

        return $this->view('new',compact('authors','model','stocks','attrs','variations'));
    }

    public function applyStock(Request $request)
    {
        $stock = Stock::with("attrs","variations")->where('id',$request->stock_id)->first();

        if($stock){
            $attrs = $stock->attrs()->with('children')->where('attributes.parent_id', null)->get();
            $stockAttrs = $stock->stockAttrs;
            $variations = $stock->variations;
            $translations = $stock->getTranslationsArray();
            $stockArray = $stock->toArray();
            $stockArray['id'] = $request->id;
            $stockArray['translatable'] = $translations;
            $model = array_merge($request->all(),$stockArray);
            $stocks = Stock::get()->pluck('name','id')->toArray();
            $authors = User::join('roles', 'users.role_id', '=', 'roles.id')
                ->where('roles.type','backend')->select('users.*','roles.title')->pluck('users.name','users.id')->toArray();
            $html = \View("admin.store.products.form",compact(['model','stocks','authors','attrs','variations','stockAttrs']))->render();

            return \Response::json(['error' => false,'html'=>$html]);
        }

        return \Response::json(['error' => true]);
    }
}