<?php

namespace App\ProductSearch\Filters;

use App\Models\AttributeStickers;
use App\ProductSearch\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Amount implements Filter
{

    public static function apply(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->whereBetween('stock_sales.price', explode(',', $value))
                ->orWhere(function ($query) use ($value) {
                    $query->whereBetween('stock_variations.price', explode(',', $value))
                        ->whereNull('stock_sales.price');
                });
        });

        return $builder;
    }
}