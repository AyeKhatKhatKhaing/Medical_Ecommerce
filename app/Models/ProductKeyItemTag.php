<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyItemTag extends Model
{
    use HasFactory;
    protected $fillable = ['key_item_tag_id','sub_key_item_tag_id','product_id'];

}
