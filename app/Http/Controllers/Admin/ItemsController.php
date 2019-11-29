<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\SupplierRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Requests\ItemsRequest;
use App\Models\Attributes;
use App\Models\Barcodes;
use App\Models\Category;
use App\Models\Items;
use App\Models\ItemsLocations;
use App\Models\ItemsPackages;
use App\Models\Suppliers;
use App\Models\Warehouse;
use App\Services\BarcodesService;
use App\Services\D1Barcode;
use App\Services\EAN13render;
use App\Services\ItemService;
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use Svg\Document;

class ItemsController extends Controller
{
    protected $view = 'admin.items';
    private $barcodeService;
    private $itemService;

    public function __construct(
        BarcodesService $barcodesService,
        ItemService $itemService
    )
    {
        $this->barcodeService = $barcodesService;
        $this->itemService = $itemService;
    }

    public function index()
    {
        return $this->view('index');
    }

    public function archives()
    {
        return $this->view('archive');
    }

    public function getNew()
    {
        $model = null;
        $bundle = false;
        $barcodes = $this->barcodeService->getPluck();
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $data = Category::recursiveItems($categories, 0, [], []);
        $brands = Category::with('children')->where('type', 'brands')->whereNull('parent_id')->get();
        $downloads = Category::where('type', 'downloads')->whereNull('parent_id')->get()->pluck('name', 'id')->all();

        $warehouses = Warehouse::all()->pluck('name', 'id')->all();
        $racks = [];
        $shelves = [];
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        return $this->view('new', compact('model', 'allAttrs', 'barcodes', 'bundle', 'categories', 'warehouses',
            'racks', 'shelves', 'data','brands','downloads'));
    }

    public function getNewBundle()
    {
        $model = null;
        $bundle = true;
        $barcodes = $this->barcodeService->getPluck();
        $warehouses = Warehouse::all()->pluck('name', 'id')->all();
        $racks = [];
        $shelves = [];
        $brands = Category::with('children')->where('type', 'brands')->whereNull('parent_id')->get();

        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $data = Category::recursiveItems($categories, 0, [], []);
        $downloads = Category::where('type', 'downloads')->whereNull('parent_id')->get()->pluck('name', 'id')->all();

        return $this->view('new', compact('model', 'allAttrs', 'barcodes', 'bundle', 'categories', 'warehouses', 'racks', 'shelves', 'data','brands','downloads'));
    }

    public function postNew(ItemsRequest $request)
    {
        $data = $request->only('sku', 'image', 'barcode_id', 'type', 'status',
            'default_price', 'landing','brand_id','manual_codes','length','width','height','weight',
            'item_length','item_width','item_height','item_weight');
//        dd($data);
        $item = Items::updateOrCreate($request->id, $data);
        $this->saveImages($request, $item);
        $this->saveVideos($request, $item);
        $this->saveDownloads($request, $item);
        $this->savePackages($item, $request->get('packages', []));


        $item->suppliers()->sync($request->get('suppliers'));
        $item->specificationsPivot()->sync($request->get('specifications', []));
        $this->itemService->makeOptions($item, $request->get('options', []));
        $item->categories()->sync(json_decode($request->get('categories', [])));

        $route = ($item->is_archive) ? 'admin_items_archives' : 'admin_items';

        return redirect()->route($route);
    }

    public function getEdit($id)
    {
        $model = Items::findOrFail($id);
        $bundle = ($model->type != 'bundle') ? false : true;
        $barcodes = $this->barcodeService->getPluck();
        $items = Items::all()->pluck('name', 'id')->all();
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get();
        $downloads = Category::where('type', 'downloads')->whereNull('parent_id')->get()->pluck('name', 'id')->all();

        $checkedCategories = $model->categories()->pluck('id')->all();
        $data = Category::recursiveItems($categories, 0, [], $checkedCategories);
        $warehouses = Warehouse::all()->pluck('name', 'id')->all();
        $racks = [];
        $shelves = [];
        $brands = Category::with('children')->where('type', 'brands')->whereNull('parent_id')->get();

        return $this->view('new', compact('model', 'allAttrs', 'barcodes', 'items', 'bundle',
            'categories', 'data', 'checkedCategories', 'warehouses', 'racks', 'shelves','brands','downloads'));
    }

    private function savePackages($item, array $data = [])
    {
        $deletableArray = [];
        if (count($data)) {
            foreach ($data as $datum) {
                $existing = $item->packages()->where('id', $datum['id'])->first();

                if ($existing) {
                    $package = ItemsPackages::find($datum['id']);
                    $package->update($datum);
                    $deletableArray[] = $package->id;
                } else {
                    $package = $item->packages()->create($datum);
                    $deletableArray[] = $package->id;
                }
            }
        }

        $item->packages()->whereNotIn('id', $deletableArray)->delete();
    }

    private function saveLocations($item, array $data = [])
    {
        $deletableArray = [];
        if (count($data)) {
            foreach ($data as $datum) {
                $existing = $item->locations()->where('id', $datum['id'])->first();

                if ($existing) {
                    $location = ItemsLocations::find($datum['id']);
                    $location->update($datum);
                    $deletableArray[] = $location->id;
                } else {
                    $location = $item->locations()->create($datum);
                    $deletableArray[] = $location->id;
                }
            }
        }

        $item->locations()->whereNotIn('id', $deletableArray)->delete();
    }

    private function saveImages(Request $request, $item)
    {
        $images = $request->get('other_images');
        if ($images) {
            $data = [];
            foreach ($images as $image) {
                $data[] = ['url' => $image, 'type' => 'image', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    private function saveVideos(Request $request, $item)
    {
        $videos = $request->get('videos');
        if ($videos) {
            $data = [];
            foreach ($videos as $video) {
                $data[] = ['url' => $video, 'type' => 'video', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    private function saveDownloads(Request $request, $item)
    {
        $downloads = $request->get('downloads');
        if ($downloads) {
            $data = [];
            foreach ($downloads as $download) {
                $data[] = ['url' => $download, 'type' => 'download', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    public function getPurchase($id)
    {
        $item = Items::FindOrFail($id);
        return $this->view('purchase', compact('item'));
    }

    public function putArchive($id)
    {
        $item = Items::FindOrFail($id);
        $item->is_archive = true;
        $item->save();

        return redirect()->back();
    }

    public function putActivate($id)
    {
        $item = Items::FindOrFail($id);
        $item->is_archive = false;
        $item->save();

        return redirect()->back();
    }

    public function getSuppliers()
    {
        return $this->view('suppliers.index');
    }

    public function getSuppliersNew()
    {
        $model = null;
        return $this->view('suppliers.new', compact('model'));
    }

    public function getSuppliersEdit($id)
    {
        $model = Suppliers::findOrFail($id);
        return $this->view('suppliers.new', compact('model'));
    }

    public function postSuppliers(SupplierRequest $request)
    {
        $data = $request->except('_token');
        Suppliers::updateOrCreate(['id' => $request->get('id')], $data);
        return redirect()->route('admin_suppliers');
    }

    public function getList(Request $request)
    {
        $attr = Suppliers::whereNotIn('id', $request->get('arr', []))->get();

        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function syncSupplier(Request $request)
    {
        $item = Items::find($request->get('item_id'));
        if ($item) {
            $item->suppliers()->attach($request->id);

            return \Response::json(['error' => false]);
        }

        return \Response::json(['error' => true, 'message' => 'message']);
    }

    public function deleteSupplier(Request $request)
    {
        $item = Items::find($request->get('item_id'));
        if ($item) {
            $item->suppliers()->detach($request->id);

            return \Response::json(['error' => false]);
        }

        return \Response::json(['error' => true, 'message' => 'message']);
    }

    public function postSuppliersList(Request $request)
    {
        $attr = Suppliers::whereNotIn('id', $request->get('arr', []))->get();

        return \Response::json(['error' => false, 'data' => $attr]);
    }

    public function addPackage(Request $request)
    {
        $items = Items::all()->pluck('name', 'id')->all();
        $package = null;
        $html = \View('admin.items._partials.package_item', compact(['package', 'items']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function addLocation(Request $request)
    {
        $warehouses = Warehouse::all()->pluck('name', 'id')->all();
        $racks = [];
        $shelves = [];

        $html = \View('admin.items._partials.location', compact(['warehouses', 'racks', 'shelves']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getSpecification(Request $request)
    {
        $selected = Attributes::find($request->id);
        $allAttrs = Attributes::with('stickers')->whereNull('parent_id')->get();
        $html = \View("admin.items._partials.specifications", compact(['selected', 'allAttrs']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function getSpecificationByCategory(Request $request)
    {
        $selecteds = Attributes::leftJoin('attribute_categories', 'attributes.id', 'attribute_categories.attribute_id')
            ->whereIn('attribute_categories.categories_id', $request->get('ids', []))
            ->select('attributes.*')
            ->groupBy('attributes.id')
            ->get();

        $html = '';
        if (count($selecteds)) {
            $allAttrs = Attributes::with('stickers')->whereNull('parent_id')->get();
            $html = \View("admin.items._partials.specification_group", compact(['selecteds', 'allAttrs']))->render();
        }


        return \Response::json(['error' => false, 'html' => $html, 'data' => $selecteds]);
    }

    public function transfer()
    {
        $items = Items::all()->pluck('name', 'id')->all();
        $warehouses = Warehouse::all()->pluck('name', 'id')->all();
        $racks = [];
        $shelves = [];
        return $this->view('transfer.index', compact(['items', 'warehouses', 'racks', 'shelves']));
    }

    public function PostTransfer(Request $request)
    {
        $model = Items::findOrFail($request->item_id);
        $from = ItemsLocations::findOrFail($request->from);
        $to = ItemsLocations::findOrFail($request->to);
        if ($from->qty < $request->qty) {
            return redirect()->back()->with('error', "Max qty that you can transfer is $from->qty");
        }

        $from->update(['qty' => ($from->qty - $request->qty)]);
        $to->update(['qty' => ($to->qty + $request->qty)]);

        return redirect()->back()->with('message', "Successfully transfered");

    }

    public function postItemLocations(Request $request)
    {
        $model = Items::findOrFail($request->item_id);
        $data = $model->locations()->get()->pluck('transfer_location', 'id')->all();

        $html = View("admin.items.transfer.locations", compact('model', 'data'))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function renderBarcode(Request $request)
    {
        $barcode = Barcodes::find($request->code);
        if (!$barcode) return response()->json(['error' => true]);

        $html = $this->view('_partials.qr', ['code' => $barcode->code,'model' => null])->render();
        return response()->json(['error' => false, 'html' => $html]);
    }

    public function downloadCode($code, $type = 'qr',$name = null)
    {
        if($type == 'manual'){
            $item = Items::findOrFail($name);
            $codes = $item->manual_codes;
            if(isset($codes[$code])){

                $path = base_path().$codes[$code]['image'];
                $name = $item->name .'manual.png';
            }

        }else{
            $barcode = Barcodes::where('code', $code)->first();
            if (!$barcode) return response()->json(['error' => true]);

            if ($type == 'qr') {

                $name = $name . 'QR.png';
                $path = \DNS2D::getBarcodePNGPath('https://kaliony.com/landings/' . $code, "QRCODE" ,200, 200);
            } else  {
                $name = $name . "BARCODE.png";
//            $path = D1Barcode::getBarcodePNGPath($barcode->code, "EAN13", 2, 100, array(0, 0, 0), true);
                $path= base_path('public/barcodes/'.$code.'.png');
            }
        }

        return \Response::download($path, $name);
    }

    public function getDownloadHtml(Request $request)
    {
        $item = Category::where('type', 'downloads')->whereNull('parent_id')->where('id',$request->id)->first();

        if (!$item) return response()->json(['error' => true]);

        $html = $this->view('_partials.manual_downloads', ['item' => $item,'model' => null])->render();
        return response()->json(['error' => false, 'html' => $html]);
    }

    public function datatableSelections(Request $request)
    {
        $method = $request->get('method');
        $type = $request->get('type');
        $ids = $request->get('ids');
        $items = Items::whereIn('id',$ids)->get();
        if($method == 'download'){
            if($type == 'qr_code'){
                $this->x($items);

                return \Response::download(public_path('codes.zip'), 'codes.zip', array('Content-Type: application/octet-stream','Content-Length: '. filesize(public_path('codes.zip'))))->deleteFileAfterSend(true);
            }
        }
        dd($request->all());
    }

    public function x($items)
    {
        $fileArray = [];
        foreach ($items as $item){
            $fileArray[] = \DNS2D::getBarcodePNGPath('https://kaliony.com/landings/' . $item->barcode->code, "QRCODE" ,200, 200);
        }

        $zipper = new Zipper();
        $zipper->make('public/codes.zip')->add($fileArray);
    }
}
