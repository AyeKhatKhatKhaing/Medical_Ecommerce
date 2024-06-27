<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponSubCategory extends Model
{
    protected $table = 'coupon_sub_categories';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'coupon_id', 
        'category_id', 
        'sub_category_id', 
    ];
}