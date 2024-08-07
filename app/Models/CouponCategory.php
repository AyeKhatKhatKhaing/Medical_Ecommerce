<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCategory extends Model
{
    protected $table = 'coupon_categories';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'coupon_id', 
        'category_id', 
    ];
}
