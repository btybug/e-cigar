<?php

namespace App\ProductSearch\Filters;

use App\ProductSearch\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SelectFilter implements Filter
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        if(is_array($value) && count($value)){
            $value = array_filter($value);
//            $attributes = array_keys($value);
//            $stickers = array_values($value);
//            if(count($attributes) && count($stickers)){
//                $builder->whereIn('attributes_id',$attributes)
//                        ->whereIn('sticker_id',$stickers);
//            }
            foreach ($value as $attr_id => $sticker_id){
                if($sticker_id){
                    $builder->where('attributes_id',$attr_id)
                        ->where('sticker_id',$sticker_id);
                }
            }
        }
        return $builder;
    }
}