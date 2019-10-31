<?php

namespace App\ItemsSearch\Filters;


use Illuminate\Database\Eloquent\Builder;

class Barcodes implements Filter
{

    public static function apply(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->whereIn('items.barcode_id', $value);
        });

        return $builder;
    }
}
