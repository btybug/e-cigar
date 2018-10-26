<?php namespace App\Services;

use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\StockAttribute;
use App\Models\StockVariation;
use App\Models\StockVariationOption;

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

    public function makeProductOptions($product,array $data = [])
    {
        $result = [];
        if(count($data)){
            foreach ($data as $parent_id => $ids) {
                $parent = ProductAttribute::where('product_id',$product->id)
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

    public function saveVariations ($stock,array $data = [], array $options = [])
    {
        $stock->variations()->delete();
        if(count($data)){
//            dd($data,$options);
            foreach ($data as $variation_id => $data) {
                $newData = json_decode($data,true);
                unset($newData['_token']);
                $newData['stock_id'] = $stock->id;
                $variation = StockVariation::create($newData);
                if(isset($options[$variation_id]) && count($options[$variation_id])){
                    foreach ($options[$variation_id] as $option){
                        $variation->options()->create($option);
                    }
                }
            }
        }
    }

    public function saveProductVariations ($product,array $data = [], array $options = [])
    {
        $product->variations()->delete();
        if(count($data)){
            foreach ($data as $variation_id => $data) {
                $newData = json_decode($data,true);
                unset($newData['_token']);
                if(isset($newData['stock_id'])){ unset($newData['stock_id']); }

                $newData['product_id'] = $product->id;
                $variation = ProductVariation::create($newData);
                if(isset($options[$variation_id]) && count($options[$variation_id])){
                    foreach ($options[$variation_id] as $option){
                        $variation->options()->create($option);
                    }
                }
            }
        }
    }
}