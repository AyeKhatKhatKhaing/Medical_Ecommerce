<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponProduct extends Model
{
    protected $table = 'coupon_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'coupon_id', 
        'category_id',
        'sub_category_id',
        'merchant_id', 
        'product_id',
    ];
}
