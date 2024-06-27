<?php

namespace App\Models;

use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnSale extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'on_sales';

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
        'sale_category_id',
        'name_en', 
        'name_tc', 
        'name_sc', 
        'content_en', 
        'content_tc', 
        'content_sc', 
        'discount_type', 
        'sale_amount', 
        'minimum_spend', 
        'maximum_spend', 
        'start_date', 
        'end_date', 
        'usage_time', 
        'usage_limit_per_coupon', 
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
        'is_translate'
    ];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc', 'discount_type', 'minimun_spend', 'maximun_spend', 'start_date',
                                        'end_date', 'usage_limit', 'member_type',
    ];

    
 
    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class , 'sale_id');
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
