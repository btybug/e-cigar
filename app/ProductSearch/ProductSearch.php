<?php

namespace App\ProductSearch;

use App\Models\AttributeStickers;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductSearch
{
    public static function apply(Request $filters, $category = null, $sql = false)
    {
        $query = static::applyDecoratorsFromRequest(
                $filters, static::createObject($category,$filters)
            );

        return static::getResults($query, $sql, $filters);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {

            $decorator = static::createFilterDecorator($filterName);
//            if($filterName =='select_filter'){
//                dd($decorator,static::isValidDecorator($decorator));
//            }

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

    private static function getResults(Builder $query, $sql, $filters)
    {
        $response = static::checkGroupBy($filters,$query);
        return ($sql) ? ['data' => $response, 'sql' => static::getSql($query->toSql(),$query->getBindings())] : $response;
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

    private static function checkGroupBy(Request $request,$query){
        $selectFilters = array_filter($request->get('select_filter',[]));
        if(count($selectFilters)){
            return $query->groupBy('stock_variations.id')->get();
        }else{
            return  $query->groupBy('stocks.id')->get();
        }
    }

    private static function createObject($category = null,$request) {
        $query = Stock::leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id');

        if($category){
            $query->leftJoin('stock_categories', 'stocks.id', '=', 'stock_categories.stock_id')
            ->where('stock_categories.categories_id',$category->id);
        }
        $query->leftJoin('stock_variations', 'stocks.id', '=', 'stock_variations.stock_id')
            ->leftJoin('stock_variation_options', 'stock_variations.id', '=', 'stock_variation_options.variation_id')
            ->leftJoin('attributes_stickers', 'stock_variation_options.attribute_sticker_id', '=', 'attributes_stickers.id')

            ->leftJoin('favorites', 'stock_variations.id', '=', 'favorites.variation_id')
            ->where('stock_translations.locale',app()->getLocale());
        return $query->select('stocks.*','stock_translations.name',
            'stock_translations.short_description','stock_variations.price','stock_variations.id as variation_id','favorites.id as is_favorite');
    }
//    private static function createObject($category = null,$request) {
//        $query = AttributeStickers::leftJoin('stock_variation_options', 'attributes_stickers.id', '=', 'stock_variation_options.attribute_sticker_id');
//
//
//        $query->leftJoin('stock_variations', 'stock_variation_options.variation_id', '=', 'stock_variations.id')
//            ->leftJoin('stocks', 'stock_variations.stock_id', '=', 'stocks.id')
//            ->leftJoin('stock_translations', 'stocks.id', '=', 'stock_translations.stock_id')
//
//            ->leftJoin('favorites', 'stock_variations.id', '=', 'favorites.variation_id')
//            ->where('stock_translations.locale',app()->getLocale());
////        if($category){
////            $query->leftJoin('stock_categories', 'stocks.id', '=', 'stock_categories.stock_id')
////                ->where('stock_categories.categories_id',$category->id);
////        }
//        return $query->select('stocks.*','attributes_stickers.*','stock_translations.name','stock_translations.short_description','stock_variations.price','stock_variations.id as variation_id','favorites.id as is_favorite');
//    }

}