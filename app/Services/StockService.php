<?php namespace App\Services;

use App\Models\StockAttribute;
use App\Models\StockVariation;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 10/18/2018
 * Time: 1:01 PM
 */
class StockService
{
    public function makeOptions($stock,array $data = [])
    {
        $result = [];

        if(count($data)){
            foreach ($data as $parent_id => $ids) {
                $parent = StockAttribute::where('stock_id',$stock->id)
                    ->where('attributes_id',$parent_id)->where('parent_id',null)->first();

                $ids = explode(',',$ids);
                if(count($ids)){
                    foreach ($ids as $id){
                        if($id){
                            $result[$id] = ['parent_id' => $parent->id];
                        }
                    }
                }

            }
        }
        return $result;
    }

    public function saveVariations ($stock,array $data = [])
    {
        $stock->variations()->delete();
        if(count($data)){
            foreach ($data as $variation_id => $data) {
                $newData = json_decode($data,true);
                unset($newData['_token']);
                $newData['stock_id'] = $stock->id;
                StockVariation::create($newData);
            }
        }
    }
}