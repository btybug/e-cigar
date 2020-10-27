<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 31.12.2017
 * Time: 00:24
 */

namespace App\Models;

use App\Models\Common\Translatable;
use App\Models\Translations\StockTranslation;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $brand_id
 * @property int $status
 * @property int $is_promotion
 * @property int $type
 * @property string|null $image
 * @property array|null $other_images
 * @property string|null $what_is_image
 * @property array|null $videos
 * @property int|null $faq_tab
 * @property int|null $reviews_tab
 * @property int $is_offer
 * @property int $offer_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $special_filter
 * @property array|null $downloads
 * @property int|null $main_item_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockSales[] $active_sales
 * @property-read int|null $active_sales_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockAds[] $ads
 * @property-read int|null $ads_count
 * @property-read \App\Models\Category|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq[] $faqs
 * @property-read int|null $faqs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $in_favorites
 * @property-read int|null $in_favorites_count
 * @property-read \App\Models\Items $main_item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $offer_products
 * @property-read int|null $offer_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $offers
 * @property-read int|null $offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PromotionPrice[] $promotion_prices
 * @property-read int|null $promotion_prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $promotions
 * @property-read int|null $promotions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $related_products
 * @property-read int|null $related_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockSales[] $sales
 * @property-read int|null $sales_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockSeo[] $seo
 * @property-read int|null $seo_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $special_filters
 * @property-read int|null $special_filters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stock[] $special_offers
 * @property-read int|null $special_offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attributes[] $specifications
 * @property-read int|null $specifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stickers[] $stickers
 * @property-read int|null $stickers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockAttribute[] $stockAttrs
 * @property-read int|null $stock_attrs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translations\StockTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attributes[] $type_attrs
 * @property-read int|null $type_attrs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockTypeAttribute[] $type_attrs_all
 * @property-read int|null $type_attrs_all_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockTypeAttribute[] $type_attrs_pivot
 * @property-read int|null $type_attrs_pivot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StockVariation[] $variations
 * @property-read int|null $variations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable listsTranslations($translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable notTranslatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable orWhereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable orWhereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable orderByTranslation($key, $sortmethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable translated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable translatedIn($locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereFaqTab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereIsOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereIsPromotion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereMainItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereOfferType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereOtherImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereReviewsTab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereSpecialFilter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable whereTranslation($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereVideos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Stock whereWhatIsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Translatable withTranslation()
 * @mixin \Eloquent
 */
class Stock extends Translatable
{
    /**
     * @var string
     */
    protected $table = 'stocks';

    public $translationModel = StockTranslation::class;

    public $translatedAttributes = ['name','slug', 'short_description', 'long_description', 'what_is_content'];
    /**specifications
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = [
        'other_images' => 'json',
        'videos' => 'json',
        'posters' => 'json',
        'downloads' => 'json',
    ];

    const TYPES = [
        'vape' => 'Devices',
        'juice' => 'Juice',
        'parts' => 'Devices parts'
    ];

    const STATUS = [
        '0' => 'Draft',
        '1' => 'Published'
    ];

    protected $appends = array('page_link');

    public function getPageLinkAttribute()
    {
        $category = $this->categories()->whereNull('categories.parent_id')->first();
        return route('product_single', ['type' =>($category)?$category->slug:'vape', 'slug' => $this->slug]);
    }

    public function specifications()
    {
        return $this->belongsToMany(Attributes::class, 'stock_attributes', 'stock_id', 'attributes_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'stock_categories', 'stock_id', 'categories_id')
            ->whereIn('categories.type', ['stocks']);
    }

    public function StockCategories()
    {
        return $this->hasMany(StockCategories::class,'stock_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function main_item()
    {
        return $this->hasOne(Items::class, 'id', 'main_item_id');
    }

    public function offers()
    {
        return $this->belongsToMany(Category::class, 'stock_categories', 'stock_id', 'categories_id')
            ->whereIn('categories.type', ['offers']);
    }

    public function stockAttrs()
    {
        return $this->hasMany(StockAttribute::class, 'stock_id')->with('children')->whereNull('parent_id');
    }

    public function variations()
    {
        return $this->hasMany(StockVariation::class, 'stock_id');
    }

    public function variations_by_user()
    {
        $role = get_role_for_product();
        return $this->hasMany(StockVariation::class, 'stock_id')->where('stock_variations.role_id',$role->id);
    }

    public function promotion_prices()
    {
        return $this->hasMany(PromotionPrice::class, 'promotion_id');
    }

    public function related_products()
    {
        return $this->belongsToMany(Stock::class, 'stock_related', 'stock_id', 'related_id');
    }

    public function StockRelated()
    {
        return $this->hasMany(StockRelated::class,'stock_id');
    }

    public function special_offers()
    {
        return $this->belongsToMany(Stock::class, 'stock_offer_products', 'stock_id', 'offer_id');
    }

    public function StockOfferProducts()
    {
        return $this->hasMany(StockOfferProducts::class,'stock_id');
    }

    public function special_filters()
    {
        return $this->belongsToMany(Category::class, 'stock_filters', 'stock_id', 'categories_id')
            ->where('categories.type','special_filter');
    }

    public function StockFilters()
    {
        return $this->hasMany(StockFilters::class,'stock_id');
    }

    public function offer_products()
    {
        return $this->belongsToMany(Stock::class, 'stock_offer_products', 'offer_id', 'stock_id');
    }

    public function promotions()
    {
        return $this->belongsToMany(Stock::class, 'product_promotions', 'stock_id', 'promotion_id')->withPivot('type');
    }

    public function stickers()
    {
        return $this->belongsToMany(Stickers::class, 'stock_stickers', 'stock_id', 'sticker_id');
    }

    public function StockStickers()
    {
        return $this->hasMany(StockStickers::class,'stock_id');
    }

    public function forRender()
    {
        if (!$this->id) return [];

        return Attributes::leftJoin('stock_variation_options', 'attributes.id', '=', 'stock_variation_options.attributes_id')
            ->leftJoin('stock_variations', 'stock_variation_options.variation_id', '=', 'stock_variations.id')
            ->leftJoin('stocks', 'stock_variations.stock_id', '=', 'stocks.id')
//            ->leftJoin('attributes', 'product_variation_options.options_id','=' ,'attributes.id')
            ->where('stocks.id', '=', $this->id)
            ->select('attributes.*', 'stock_variation_options.attributes_id as attr_id')
            ->distinct()
//            ->groupBy('attr_id','attributes.id','attributes.parent_id','attributes.user_id','attributes.image','attributes.icon','attributes.filter','attributes.display_as','attributes.created_at','attributes.updated_at')
            ->get();

    }

    public function seo()
    {
        return $this->hasOne(StockSeo::class, 'stock_id');
    }

    public function getSeoField($name, $lang = 'gb')
    {
        $seo = $this->seo;
        return ($seo) ? $seo->{$name} : null;
    }

    public function type_attrs()
    {
        return $this->belongsToMany(Attributes::class, 'stock_type_attributes', 'stock_id', 'attributes_id')
            ->whereNull('stock_type_attributes.sticker_id')->withPivot('type');
    }

    public function type_attrs_all()
    {
        return $this->hasMany(StockTypeAttribute::class, 'stock_id', 'id');
    }

    public function type_attrs_pivot()
    {
        return $this->hasMany(StockTypeAttribute::class, 'stock_id', 'id')
            ->whereNotNull('stock_type_attributes.sticker_id');
    }

    public function sales()
    {
        return $this->hasMany(StockSales::class, 'stock_id');
    }

    public function active_sales()
    {
        $now = strtotime(now());
        return $this->hasMany(StockSales::class, 'stock_id')->where('canceled', false)
            ->whereRaw("stock_sales.start_date <= ? AND stock_sales.end_date >= ?",
                array($now, $now)
            );
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_stocks', 'stock_id', 'faq_id');
    }

    public function in_favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'stock_id', 'user_id');
    }

    public function ads()
    {
        return $this->hasMany(StockAds::class, 'stock_id');
    }

    public function banners()
    {
        return $this->hasMany(StockBanners::class, 'stock_id');
    }

    public function duplicate()
    {
        //copy attributes
        $newModel = $this->replicateWithTranslations();
        $newModel->slug = $this->slug. '-'.shortUniqueID(); //need update
        //save model before you recreate relations (so it has an id)
        $newModel->push();

        foreach ($this->variations as $variation) {
            $new_variation = $variation->replicate();
            $new_variation->stock_id = $newModel->id;
            $new_variation->push();
            foreach ($variation->options as $option){
                $new_option = $option->replicate();
                $new_option->variation_id = $variation->id;
                $new_option->push();
            }
            foreach ($variation->discounts as $discount){
                $new_discount = $discount->replicate();
                $new_discount->variation_id = $variation->id;
                $new_discount->push();
            }
        }

        foreach ($this->specifications as $specification) {
            $new_specification = $specification->replicate();
            $new_specification->stock_id = $newModel->id;
            $new_specification->push();
        }

        foreach ($this->StockCategories as $category) {
            $new_category = $category->replicate();
            $new_category->stock_id = $newModel->id;
            $new_category->push();
        }

        foreach ($this->StockStickers as $sticker) {
            $new_sticker = $sticker->replicate();
            $new_sticker->stock_id = $newModel->id;
            $new_sticker->push();
        }

        foreach ($this->banners as $banner) {
            $new_banner = $banner->replicate();
            $new_banner->stock_id = $newModel->id;
            $new_banner->push();
        }

        foreach ($this->ads as $ad) {
            $new_ad = $ad->replicate();
            $new_ad->stock_id = $newModel->id;
            $new_ad->push();
        }

        foreach ($this->StockRelated as $related) {
            $new_related = $related->replicate();
            $new_related->stock_id = $newModel->id;
            $new_related->push();
        }

        foreach ($this->StockOfferProducts as $offerProduct) {
            $new_offer = $offerProduct->replicate();
            $new_offer->stock_id = $newModel->id;
            $new_offer->push();
        }

        foreach ($this->StockFilters as $stockFilter) {
            $new_filter = $stockFilter->replicate();
            $new_filter->stock_id = $newModel->id;
            $new_filter->push();
        }

        if($this->seo){
            $new_seo = $this->seo->replicate();
            $new_seo->stock_id = $newModel->id;
            $new_seo->push();
        }
        return $newModel;
    }
}
