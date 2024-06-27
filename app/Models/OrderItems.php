<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Recipient;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'recipient_id',
        'product_id',
        'variable_id',
        'sku',
        'product_type',
        'qty_ordered',
        'discount_percent',
        'price',
        'discount_amount',
        'total',
        'item_description',
        'booking_id',
        'order_status',
        'cancel_reason',
        'refund_amount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
    public function variable_product()
    {
        return $this->belongsTo(ProductVariation::class, 'variable_id');
    } 

    public function recipient()
    {
        return $this->belongsTo(Recipient::class,'recipient_id');
    }

}
