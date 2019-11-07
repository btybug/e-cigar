<?php

namespace App\Http\Controllers\Find;

use App\DataTables\ItemsDataTable;
use App\DataTables\ItemsDataTableEditor;
use App\Http\Controllers\Controller;
use App\Models\Barcodes;
use App\Models\Category;
use App\Models\Items;
use Google\Auth\Cache\Item;
use Illuminate\Http\Request;
use Milon\Barcode\DNS2D;

class ItemsController extends Controller
{
    public function index(ItemsDataTable $dataTable)
    {
        $categories = Category::where('type', 'stocks')->get()->pluck('name', 'id')->all();
        $brands = Category::where('type', 'brands')->get()->pluck('name', 'id')->all();
        $barcodes = Barcodes::all()->pluck('code', 'id');
        $data=collect(request()->all());
        return $dataTable->render('admin.find.items.index',compact(['categories','brands','barcodes','data']));
    }


    public function store(ItemsDataTableEditor $editor)
    {
        return $editor->process(request());
    }

    public function getBarcodes(Request $request){
        $barcodes=Items::leftJoin('barcodes','items.barcode_id','barcodes.id')
            ->leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->where('item_translations.locale',app()->getLocale())
            ->select('barcodes.code as value','item_translations.name as file_name')
            ->whereIn('items.id',$request->get('ids'))->get();
        return response()->json(['barcodes'=>$barcodes]);
    }

    public function getQrcodes(Request $request){
        if(! \File::isDirectory(public_path().DS."qrcodes")){
            \File::makeDirectory(public_path().DS."qrcodes");
        }

        $barcodes=Items::leftJoin('barcodes','items.barcode_id','barcodes.id')
            ->leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->where('item_translations.locale',app()->getLocale())
            ->select('barcodes.code as value','item_translations.name as file_name')
            ->whereIn('items.id',$request->get('ids'))->get();

        $count = 1;
        $fileArray = [];
        foreach ($barcodes as $item){
            $d = new DNS2D();
            $d->setStorPath(public_path().DS."qrcodes".DS);
            $fileArray[] = [
              'url' => url("public/".$d->getBarcodePNGPath('https://kaliony.com/landings/' . $item->value, "QRCODE" ,200, 200)),
              'name' =>   "QR_".$item->file_name
            ];
        }

        $fileArray = collect($fileArray)->chunk(10);
        foreach ($fileArray as $key => $value){
            $fileArray[$key] = $value->toArray();
        }

        return response()->json(['qrcodes'=>$fileArray]);
    }
}
