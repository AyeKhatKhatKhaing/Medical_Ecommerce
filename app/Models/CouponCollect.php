<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CouponCollect extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupon_collects';

    protected $primaryKey = 'id';

    
    protected $fillable = [
        'customer_id', 
        'coupon_id', 
        'bundle_coupon_id',
        'limit_pickup_day',
        'limit_per_member',
        'is_available',
    ];

}