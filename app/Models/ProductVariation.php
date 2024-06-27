<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;
    protected $table = 'product_variations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'sku','original_price', 'discount_price', 'promotion_price', 'avg_price', 
        'stock', 'product_id','number_of_dose','name_en','name_tc','name_sc'
    ];

    protected static $logAttributes = ['sku', 'original_price', 'avg_price', 'stock', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
