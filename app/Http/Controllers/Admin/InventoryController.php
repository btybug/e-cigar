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
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    protected $view = 'admin.inventory';

    public function stock()
    {
        return $this->view('stock');
    }

    public function stockNew()
    {

        $attributes = Attributes::whereNull('parent_id')->get();
        return $this->view('stock_new',compact(['attributes']));
    }

    public function linkAll (Request $request)
    {
        $data = $request->get('data');
        if(count($data)){
            $arPhrases = array_first($data);
            array_shift($data);
            foreach ($data as $i => $v){
                $notFullCount = count($arPhrases);
                foreach ($arPhrases as $phrase) {
                    foreach ($data[$i] as $newPart) {
                        $arPhrases[] = $phrase."-".$newPart;
                    }
                }
                $arPhrases = array_slice($arPhrases, $notFullCount);
            }

            $results = [];
            if(count($arPhrases)){
                foreach ($arPhrases as $string){
                    $results[] = explode('-', $string);
                }
            }

            $html = \View('admin.inventory._partials.link_all',compact(['results']))->with('data',$request->get('data'))->render();
            return \Response::json(['error' => false,'html' => $html]);
        }

        return \Response::json(['error' => true]);
    }
}