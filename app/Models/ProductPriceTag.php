<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceTag extends Model
{
    use HasFactory;
    protected $fillable = ['price_tag_id','product_id'];

}
