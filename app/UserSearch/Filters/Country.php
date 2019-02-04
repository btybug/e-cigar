<?php

namespace App\UserSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

class Country implements Filter
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
        return $builder->whereIn('country', $value);
    }
}