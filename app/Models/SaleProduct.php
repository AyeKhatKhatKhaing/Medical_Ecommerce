<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table = 'sale_products';

    protected $primaryKey = 'id';

    protected $fillable = ['sale_id', 'product_id', 'usage_limit_per_sale',];

}
