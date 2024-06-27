<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponExSubCategory extends Model
{
    protected $table = 'coupon_ex_sub_categories';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'coupon_id', 
        'category_id', 
        'ex_sub_category_id', 
    ];
}
