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

    public function attrs()
    {
        return $this->belongsToMany(Attributes::class, 'product_attributes', 'product_id', 'attributes_id')->whereNull('attributes.parent_id');
    }
}
