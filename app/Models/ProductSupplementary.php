<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSupplementary extends Model
{
    use HasFactory;

    protected $table = 'product_supplementaries';

    protected $fillable = ['product_id', 'supplementary_id'];
}
