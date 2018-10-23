<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Stock;
use App\Services\StockService;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    protected $view = 'admin.inventory';

    private $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function stock()
    {
        return $this->view('stock');
    }

    public function stockNew()
    {
        $model = null;
        return $this->view('stock_new', compact(['model']));
    }

    public function getStockEdit($id)
    {
        $model = Stock::findOrFail($id);
        $attrs = $model->attrs()->where('attributes.parent_id', null)->get();
        return $this->view('stock_new', compact(['model', 'attrs']));
    }

    public function postStock(Request $request)
    {
        $data = $request->except('_token', 'translatable', 'attributes', 'options', 'variations');
        $data['user_id'] = \Auth::id();
        $stock = Stock::updateOrCreate($request->id, $data);
        $stock->attrs()->sync($request->get('attributes'));
        $options = $this->stockService->makeOptions($stock, $request->get('options'));
        $stock->attrs()->syncWithoutDetaching($options);

        $this->stockService->saveVariations($stock, $request->get('variations'));

        return redirect()->route('admin_stock');
    }

    public function linkAll(Request $request)
    {
        $data = $request->get('data');
        if (count($data)) {
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

            $results = [];
            if (count($firstKeyArray)) {
                foreach ($firstKeyArray as $string) {
                    $results[] = explode('-', $string);
                }
            }

            $html = \View('admin.inventory._partials.link_all', compact(['results']))->with('data', $request->get('data'))->render();
            return \Response::json(['error' => false, 'html' => $html]);
        }

        return \Response::json(['error' => true]);
    }

    public function variationForm(Request $request)
    {
        $variationID = $request->get('variationId');
        $model = json_decode($request->get('data'), true);
        $html = \View('admin.inventory._partials.variation_form', compact(['variationID', 'model']))->render();
        return \Response::json(['error' => false, 'html' => $html]);
    }
}