<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;


use App\Models\Common\Translatable;
use App\Models\Translations\PostsTranslation;
use App\Models\Translations\ProductsTranslation;
use App\User;

class Products extends Translatable
{
    use Commentable;

    protected $canBeRated = true;

    protected $mustBeApproved = true;

    protected $table = 'products';

    public $translationModel = ProductsTranslation::class;

    protected $guarded = ['id'];

    public $translatedAttributes = ['name', 'short_description', 'long_description'];

    protected $casts = [
        'other_images' => 'json',
        'videos' => 'json',
        'posters' => 'json',
    ];

    public function author ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stockAttrs()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id')->with('children')->whereNull('parent_id');
    }

    public function attrs()
    {
        return $this->belongsToMany(Attributes::class, 'product_attributes', 'product_id', 'attributes_id')
        ->select('attributes.*','product_attributes.is_shared as is_shared')->whereNull('attributes.parent_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    public function forRender()
    {
        if(! $this->id) return [];

        return Attributes::leftJoin('product_variation_options', 'attributes.id','=' ,'product_variation_options.attributes_id')
             ->leftJoin('product_variations', 'product_variation_options.variation_id','=' ,'product_variations.id')
            ->leftJoin('products', 'product_variations.product_id','=' ,'products.id')
//            ->leftJoin('attributes', 'product_variation_options.options_id','=' ,'attributes.id')
            ->where('products.id','=',$this->id)
            ->select('attributes.*','product_variation_options.attributes_id as attr_id')
            ->distinct()
//            ->groupBy('attr_id','attributes.id','attributes.parent_id','attributes.user_id','attributes.image','attributes.icon','attributes.filter','attributes.display_as','attributes.created_at','attributes.updated_at')
            ->get();

    }
}
