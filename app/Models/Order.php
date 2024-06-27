<?php

namespace App\Models;

use App\Models\Coupon;
use App\Models\PromoCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'invoice_no', 
        'customer_id',
        'promo_code_id',
        'coupon_id',
        'first_name', 
        'last_name', 
        'phone', 
        'email', 
        'country',
        'area_id',
        'district_id',
        'discount_percent', 
        'discount_amount', 
        'sub_total', 
        'grand_total', 
        'payment_status', 
        // 'order_reward_points',
        'coupon_amount',
        'promo_code_amount',
        'promotion_discount',
        'onsale_discount',
        'order_status', 
        'status', 
        'order_note', 
        'message', 
        'payment_type',
        'payslip',
        'stripe_payment_id',
        'card_name',
        'payment_method', 
    ];
    
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function cardInfo()
    {
        return $this->belongsTo(CardInfo::class, 'coupon_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class,'orders_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function billingInfo()
    {
        return $this->hasOne(BillingInfo::class,'order_id');
    }
}
