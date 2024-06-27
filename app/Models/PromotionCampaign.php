<?php

namespace App\Models;

use App\Models\SaleProduct;
use App\Models\PromotionProduct;
use App\Models\PromotionCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionCampaign extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promotion_campaigns';

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
        'promotion_category_id',
        'code', 
        'name_en', 
        'name_tc', 
        'name_sc', 
        'description_en', 
        'description_tc', 
        'description_sc', 
        'discount_type', 
        'coupon_amount', 
        'minimum_spend', 
        'maximum_spend', 
        'start_date', 
        'end_date', 
        'usage_time', 
        'usage_limit_per_promotion', 
        'product_limit_type', 
        'usage_limit_per_member', 
        'total_used_member', 
        'member_type', 
        'merchant_id',
        'exclude_merchant_id',
        'product_ids', 
        'exclude_products', 
        'product_categories', 
        'exclude_categories', 
        'product_sub_categories', 
        'exclude_sub_categories', 
        'recommend_products',
        'is_published',
        'is_translate',
    ];

    protected static $logAttributes = ['code', 'name_en', 'name_sc', 'name_tc', 'coupon_amount', 'maximum_spend', 'maximum_spend', 'start_date', 'end_date',
                                        'usage_time', 'member_type',
    ];

    
    public function category()
    {
        return $this->belongsTo(PromotionCategory::class , 'promotion_category_id');
    }
    public function promotionProducts()
    {
        return $this->hasMany(PromotionProduct::class , 'promotion_id');
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
