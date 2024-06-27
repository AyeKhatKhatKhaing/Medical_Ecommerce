<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponAttribute extends Model
{
    protected $table = 'coupon_attributes';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'is_include_exclude', 
        'coupon_id', 
        'category_id', 
        'sub_category_id',
        'ex_sub_category_id',
        'merchant_id',
        'ex_merchant_id',
        'product_id',
        'ex_product_id',
    ];
}
