<?php

namespace App\Models;

use App\Models\User;
use App\Models\CouponCollect;
use App\Models\CouponProduct;
use App\Models\CouponAttribute;
use App\Models\CouponSubCategory;
use Spatie\Activitylog\LogOptions;
use App\Models\CouponExSubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

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
        'coupon_category_id',
        'banner_img',
        'icon',
        'name_en',
        'name_tc',
        'name_sc',
        'sub_title_en',
        'sub_title_tc',
        'sub_title_sc',
        'content_en',
        'content_tc',
        'content_sc',
        'is_new_or_limited',
        'discount_type',
        'coupon_amount',
        'minimum_spend',
        'maximum_spend',
        'start_date',
        'end_date',
        'usage_time',
        'pick_up_limit',
        'usage_limit_per_coupon',
        'product_limit_type',
        'usage_limit_per_member',
        'total_used_member',
        'member_type',
        'merchant_id',
        'is_bundle',
        'is_checked_product',
        'is_checked_exproduct',
        'is_published',
        'is_translate',
        'coupon_code',
        'owner_type',
        'coupon_type',
    ];

    protected static $logAttributes = [
        'coupon_code', 'coupon_description', 'coupon_type', 'coupon_amount', 'start_date', 'end_date', 'is_published'
    ];

    protected $appends = ['coupon_id_arr'];

    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }

    public function collects()
    {
        return $this->hasMany(CouponCollect::class, 'coupon_id');
    }

    public function couponCategories()
    {
        return $this->hasMany(CouponCategory::class,'coupon_id');
    }

    public function couponSubCategories()
    {
        return $this->hasMany(CouponSubCategory::class,'coupon_id');
    }

    public function couponExSubCategory()
    {
        return $this->hasMany(CouponExSubCategory::class,'coupon_id');
    }

    public function couponProducts()
    {
        return $this->hasMany(CouponProduct::class,'coupon_id');
    }

    public function couponAttributes()
    {
        return $this->hasMany(CouponAttribute::class,'coupon_id');
    }

    public function getCouponIdArrAttribute()
    {
        return CouponAttribute::where('coupon_id',$this->id)->pluck('category_id');
    }


    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getCouponSubCategoriesProductsAttribute(){
        $couponSubCategory = CouponSubCategory::where("coupon_id",$this->id)->pluck("sub_category_id")->toArray();
        $product = Product::whereIn("sub_category_id",$couponSubCategory)->get();
        return $product;
    }

    public function getCouponCategoriesProductsAttribute() {
        $couponCategory = CouponCategory::where("coupon_id",$this->id)->pluck("category_id")->toArray();
        $product = Product::whereIn("category_id",$couponCategory)->get();
        return $product;
    }
}