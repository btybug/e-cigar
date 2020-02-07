<?php

namespace App\ItemsSearch\Filters;


use Illuminate\Database\Eloquent\Builder;

class Categories implements Filter
{

    public static function apply(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->whereIn('item_categories.categories_id', $value);
        });

        return $builder;
    }
}
