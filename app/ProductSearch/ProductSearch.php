<?php

namespace App\ProductSearch;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductSearch
{
    public static function apply(Request $filters, $category = null, $sql = false)
    {

        $query = static::applyDecoratorsFromRequest(
                $filters, static::createObject($category)
            );

        return static::getResults($query, $sql);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {

            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator) && static::isValidValue($value)) {
                $query = $decorator::apply($query, $value);
            }

        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' .
            str_replace(' ', '',
                ucwords(str_replace('_', ' ', $name)));
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function isValidValue($value)
    {
        return ($value && $value != '') ? true : false;
    }

    private static function getResults(Builder $query, $sql)
    {
        return ($sql) ? ['data' => $query->get(), 'sql' => static::getSql($query->toSql(),$query->getBindings())] : $query->get();
    }

    private static function getSql($sql, $bindings)
    {
        $needle = '?';
        foreach ($bindings as $replace) {
            $pos = strpos($sql, $needle);
            if ($pos !== false) {
                if (gettype($replace) === "string") {
                    $replace = ' "' . addslashes($replace) . '" ';
                }
                $sql = substr_replace($sql, $replace, $pos, strlen($needle));
            }
        }
        return $sql;
    }

    private static function createObject($category = null) {
        $query = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id');

        if($category){
            $query->leftJoin('stock_categories', 'stocks.id', '=', 'stock_categories.stock_id')
            ->where('stock_categories.categories_id',$category->id);
        }
        $query->leftJoin('stock_variations', 'stocks.id', '=', 'stock_variations.stock_id')
            ->leftJoin('favorites', 'stock_variations.id', '=', 'favorites.variation_id')
            ->where('stock_translations.locale',app()->getLocale());
        return $query->select('stocks.*','stock_translations.name','stock_translations.short_description','stock_variations.price','stock_variations.id as variation_id','favorites.id as is_favorite')
            ->groupBy('stock_variations.stock_id');
    }

}