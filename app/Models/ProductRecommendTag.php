<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRecommendTag extends Model
{
    use HasFactory;

    protected $table = 'product_recommend_tags';

    protected $fillable = ['recommend_tag_id', 'product_id'];
}
