<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAddOnItem extends Model
{
    use HasFactory;

    protected $table = 'product_add_on_items';

    protected $fillable = ['add_on_item_id', 'product_id'];
}
