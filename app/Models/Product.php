<?php

namespace App\Models;

use App\Models\Area;
use App\Models\User;
use App\Models\OnSale;
use App\Models\DoseTag;
use App\Models\Package;
use App\Models\Category;
use App\Models\FreeGift;
use App\Models\PriceTag;
use App\Models\AddOnItem;
use App\Models\Recipient;
use App\Models\FeatureTag;
use App\Models\KeyItemTag;
use App\Models\OrderItems;
use App\Models\SubCategory;
use App\Models\TimeSlotTag;
use App\Models\HighlightTag;
use App\Models\ProductImage;
use App\Models\RecommendTag;
use App\Models\CouponProduct;
use App\Models\SubKeyItemTag;
use App\Models\ProductLocation;
use App\Models\ProductPriceTag;
use App\Models\VaccineStockTag;
use App\Models\MerchantLocation;
use App\Models\ProductAddOnItem;
use App\Models\ProductVariation;
use App\Models\ProductFeatureTag;
use App\Models\ProductKeyItemTag;
use App\Models\VaccineFactoryTag;
use App\Models\ProductSubCategory;
use App\Models\ProductTimeSlotTag;
use Spatie\Activitylog\LogOptions;
use App\Models\ProductHighlightTag;
use App\Models\ProductRecommendTag;
use App\Models\ProductSupplementary;
use App\Models\ProductVaccineStockTag;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_id',
        'name_en', 
        'name_tc', 
        'name_sc', 
        'is_published', 
        'is_recommend',
        'is_book_count',
        'is_show_home',
        'sort_by_for_home',
        'sort_by_for_recommend',
        'slug_en', 
        'slug_tc', 
        'slug_sc',
        'sku',
        'check_up_package_id',
        'original_price', 
        'discount_price', 
        'promotion_price', 
        'avg_price',
        'stock', 
        'featured_img', 
        'meta_img', 
        'product_code',
        'number_of_dose',
        'free_gift_id',
        'qdollar_rebate_id',
        'category_id',
        'sub_category_id',
        'plan_description_id', 
        'plan_process_id',
        'for_tag_en',
        'for_tag_tc',
        'for_tag_sc',
        'add_on_reminder_en',
        'add_on_reminder_tc',
        'add_on_reminder_sc',
        'recipient_content_en',
        'recipient_content_sc',
        'recipient_content_tc',
        'package_reminder_en',
        'package_reminder_tc',
        'package_reminder_sc',
        'meta_title_en', 
        'meta_title_tc', 
        'meta_title_sc', 
        'updated_by',
        'meta_description_en', 
        'meta_description_tc', 
        'meta_description_sc',
        'is_translate',
        'product_type',
        'is_two_recipient',
        'book_count',
    ];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc', 'sku', 'product_code', 'original_price', 'avg_price'];
    protected $appends = ['sub_category_ids_arr', 'price_tag_ids_arr','time_slot_tag_ids_arr','vaccine_factory_tag_ids_arr','hightlight_tag_ids_arr','feature_tag_ids_arr',
        'key_item_tag_ids_arr','add_on_item_ids_arr','recommend_tag_ids_arr','vaccine_stock_tag_ids_arr','supplementary_ids_arr','feature_tag_ids_arr','vaccine_stock_tag_data_arr',
        'price_tag_data_arr','key_item_tag_data_arr','vaccine_factory_tag_data_arr','recommend_tag_data_arr','hightlight_tag_data_arr','add_on_item_data','add_on_item_data_json','product_location_ids_arr',
        'product_location_data'
    ];

    // public function scopeOnSale()
    // {
    //     return $onSale = OnSale::pluck('product_ids');
    // }
    public function package()
    {
        return $this->belongsTo(Package::class, 'check_up_package_id');
    }
    public function featureTags()
    {
        return $this->belongsToMany(FeatureTag::class,'product_feature_tags');
    }

    public function freeGift()
    {
        return $this->belongsTo(FreeGift::class,'free_gift_id');
    }

    public function merchant()
    {
        return $this->belongsTo(User::class,'merchant_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function priceTags()
    {
        return $this->belongsToMany(PriceTag::class,'product_price_tags');
    }

    public function recipients()
    {
        return $this->hasMany(Recipient::class,'product_id');
    }

    public function timeSlotTags()
    {
        return $this->hasMany(ProductTimeSlotTag::class);
    }

    public function vaccineFactoryTags()
    {
        return $this->belongsToMany(VaccineFactoryTag::class,'product_vaccine_factory_tags');
    }

    public function vaccineStockTags()
    {
        return $this->hasMany(ProductVaccineFactoryTag::class);
    }

    public function highlightTags()
    {
        return $this->belongsToMany(HighlightTag::class,'product_highlight_tags');
    }

    public function keyItemTags()
    {
        return $this->belongsToMany(KeyItemTag::class,'product_key_item_tags')->withPivot('key_item_id');
    }

    public function subKeyItemTags()
    {
        return $this->belongsToMany(SubKeyItemTag::class,'product_key_item_tags')->withPivot('sub_key_item_id');
    }

    public function recommendTags()
    {
        return $this->belongsToMany(RecommendTag::class,'product_recommend_tags');
    }
    public function doseTags()
    {
        return $this->belongsToMany(DoseTag::class,'product_dose_tags');
    }

    public function productsVariations()
    {
        return $this->hasMany(ProductVariation::class,'product_id');
    }

    public function productsImages()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function productGallery()
    {
        return $this->hasMany(ProductImage::class,'type_id')->where('image_type','product');
    }

    public function productCoupon()
    {
        return $this->hasMany(CouponProduct::class,'product_id');
    }

    public function getPriceTagIdsArrAttribute()
    {
        $priceTags = ProductPriceTag::where('product_id',$this->id)->pluck('price_tag_id')->toArray();
        return $priceTags;
    }

    public function getTimeSlotTagIdsArrAttribute()
    {
        $timeSlotTags = ProductTimeSlotTag::where('product_id',$this->id)->pluck('time_slot_tag_id')->toArray();
        return $timeSlotTags;
    }

    public function getVaccineFactoryTagIdsArrAttribute()
    {
        $vaccineFactoryTags = ProductVaccineFactoryTag::where('product_id',$this->id)->pluck('vaccine_factory_tag_id')->toArray();
        return $vaccineFactoryTags;
    }
    public function getVaccineFactoryTagDataArrAttribute()
    {
        $vaccineIds = ProductVaccineFactoryTag::where('product_id',$this->id)->pluck('vaccine_factory_tag_id')->toArray();
        $vaccineFactoryTags = VaccineFactoryTag::whereIn('id',$vaccineIds)->get();
        return $vaccineFactoryTags;
    }

    public function getPriceTagDataArrAttribute()
    {
        $priceIds = ProductPriceTag::where('product_id',$this->id)->pluck('price_tag_id')->toArray();
        $priceTags = PriceTag::whereIn('id',$priceIds)->get();
        return $priceTags;
    }

    

    public function getHightlightTagIdsArrAttribute()
    {
        $highlightTags = ProductHighlightTag::where('product_id',$this->id)->pluck('highlight_tag_id')->toArray();
        return $highlightTags;
    }

    public function getHightlightTagDataArrAttribute()
    {
        $highlightIds = ProductHighlightTag::where('product_id',$this->id)->pluck('highlight_tag_id')->toArray();
        $highlightTags = HighlightTag::whereIn('id',$highlightIds)->get();
        return $highlightTags;
    }

    public function getAddOnItemDataAttribute()
    {
        $addOnItems = ProductAddOnItem::where('product_id',$this->id)->pluck('add_on_item_id')->toArray();
        $addons = AddOnItem::where('is_published',true)->whereIn('id',$addOnItems)->get();
        return $addons;
    }
    public function getAddOnItemDataJsonAttribute()
    {
        $addOnItems = ProductAddOnItem::where('product_id',$this->id)->pluck('add_on_item_id')->toArray();
        $addons = AddOnItem::where('is_published',true)->whereIn('id',$addOnItems)->select('id','name_en','original_price')->get();
        return $addons;
    }

    public function getFeatureTagIdsArrAttribute()
    {
        $featureTags = ProductFeatureTag::where('product_id',$this->id)->pluck('feature_tag_id')->toArray();
        return $featureTags;
    }

    public function getFeatureTagDataArrAttribute()
    {
        $featureTagIds = ProductAddOnItem::where('product_id',$this->id)->pluck('feature_tag_id');
        $feature = FeatureTag::whereIn('id',$featureTagIds)->get();
        return $feature;
    }

    public function getKeyItemTagIdsArrAttribute()
    {
        $keyItemTags = ProductKeyItemTag::where('product_id',$this->id)->pluck('key_item_tag_id')->toArray();
        return $keyItemTags;
    }
    public function getKeyItemTagDataArrAttribute()
    {
        $keyItemTags = ProductKeyItemTag::where('product_id',$this->id)->pluck('key_item_tag_id')->toArray();
        $keyItemTags = KeyItemTag::whereIn('id',$keyItemTags)->get();
        return $keyItemTags;
    }

    public function getSubCategoryIdsArrAttribute()
    {
        $subCates = ProductSubCategory::where('product_id',$this->id)->pluck('sub_category_id')->toArray();
        return $subCates;
    }

    public function getAddOnItemIdsArrAttribute()
    {
        $subCates = ProductAddOnItem::where('product_id',$this->id)->pluck('add_on_item_id')->toArray();
        return $subCates;
    }

    public function getRecommendTagIdsArrAttribute()
    {
        $subCates = ProductRecommendTag::where('product_id',$this->id)->pluck('recommend_tag_id')->toArray();
        return $subCates;
    }

    public function getRecommendTagDataArrAttribute()
    {
        $recommendIds = ProductRecommendTag::where('product_id',$this->id)->pluck('recommend_tag_id')->toArray();
        $recommendTags = RecommendTag::whereIn('id',$recommendIds)->get();
        return $recommendTags;
    }

    public function getVaccineStockTagIdsArrAttribute()
    {
        $vaccineStocks = ProductVaccineStockTag::where('product_id',$this->id)->pluck('vaccine_stock_tag_id')->toArray();
        return $vaccineStocks;
    }

    public function getVaccineStockTagDataArrAttribute()
    {
        $stockIds = ProductVaccineStockTag::where('product_id',$this->id)->pluck('vaccine_stock_tag_id')->toArray();
        $vaccineStocks = VaccineStockTag::whereIn('id',$stockIds)->get();
        return $vaccineStocks;
    }

    public function getSupplementaryIdsArrAttribute()
    {
        $supplementaries = ProductSupplementary::where('product_id',$this->id)->pluck('supplementary_id')->toArray();
        return $supplementaries;
    }

    // public function getMerchantFullAddressAttribute()
    // {
    //     $merchant = $this->merchant->where('is_merchant',true)->first();
    //     dd(MerchantLocation::where('merchant_id',$merchant->id)->select('full_address_en')->first());
    // }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getFavouriteAttribute()
    {
        $checkFavouriteProduct = ProductFavourite::where('product_id',$this->id)
                                                ->where("customer_id",auth()->guard('customer')->user()->id)
                                                ->get();
        return $checkFavouriteProduct;
    }
    public function order_items()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function getproductLocations()
    {
        $product_location = ProductLocation::where('product_id',$this->id)->get();
        return $product_location;
    }
    public function getProductLocationIdsArrAttribute()
    {
        $productLocationIds = ProductLocation::where('product_id',$this->id)->pluck('merchant_location_id')->toArray();
        return $productLocationIds;
    }

    public function getProductLocationDataAttribute()
    {
        $productIds = ProductLocation::where('product_id',$this->id)->where('merchant_id',$this->merchant->id)->pluck('merchant_location_id')->toArray();
        $locationIds = MerchantLocation::with('area','weekDays','events')->where('merchant_id',$this->merchant->id)->whereIn('area_id',$productIds)->get();
        // $areas = Area::with('merchantLocation')->whereIn('id',$locationIds)->get();
        return $locationIds;
    }

    // public function getKeyItemTagIdsArrAttribute()
    // {
    //     $key_item_tag = ProductKeyItemTag::where('product_id',$this->id)->pluck('key_item_tag_id')->toArray();
    //     return $key_item_tag;
    // }

}
