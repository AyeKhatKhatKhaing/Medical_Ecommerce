<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatureTag extends Model
{
    use HasFactory;

    protected $fillable = ['feature_tag_id','product_id'];

}
