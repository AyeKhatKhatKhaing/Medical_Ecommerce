<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVaccineStockTag extends Model
{
    use HasFactory;

    protected $fillable = ['vaccine_stock_tag_id','product_id'];
}
