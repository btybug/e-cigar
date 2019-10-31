<?php

namespace App\ItemsSearch\Filters;


use Illuminate\Database\Eloquent\Builder;

class Q implements Filter
{

    public static function apply(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->where('item_translations.name',"LIKE","%".$value."%")
                ->orWhere(function ($query) use ($value){
                    $query->where('item_translations.short_description',"LIKE","%".$value."%")
                        ->orWhere('item_translations.long_description',"LIKE","%".$value."%");
                });
        });
        return $builder;
    }
}
