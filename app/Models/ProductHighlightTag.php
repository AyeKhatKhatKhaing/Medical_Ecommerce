<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHighlightTag extends Model
{
    use HasFactory;
    protected $fillable = ['highlight_tag_id','product_id'];

}
