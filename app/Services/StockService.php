<?php namespace App\Services;

use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\StockAttribute;
use App\Models\StockTypeAttribute;
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

    public function makeTypeOptions($stock,array $data = [])
    {
        $result = [];

        if(count($data)){
            foreach ($data as $datum) {
                $attr_id = $datum['attributes_id'];
                $ids = $datum['options'];

                $ids = explode(',',$ids);
                $result[] = ['attributes_id' => $attr_id];
                if(count($ids)){
                    foreach ($ids as $id){
                        if($id){
                            $result[] = ['attributes_id' => $attr_id,'sticker_id' => $id];
                        }
                    }
                }

            }
        }

        $stock->type_attrs()->sync($result);
//        $stock->type_attrs()->syncWithoutDetaching($type_options);

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

    public function saveVariations ($stock,array $data = [])
    {
        $stock->variations()->delete();
        if(count($data)){
            foreach ($data as $variation_id => $data) {
                $newData = json_decode($data,true);
                $newData['stock_id'] = $stock->id;
                $attributes = $newData['options'];
                $variation = StockVariation::create($newData);
                if(isset($attributes) && count($attributes)){
                    foreach ($attributes as $option){
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