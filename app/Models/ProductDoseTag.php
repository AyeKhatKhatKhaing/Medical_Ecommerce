<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDoseTag extends Model
{
    use HasFactory;

    protected $table = 'product_dose_tags';

    protected $fillable = ['dose_tag_id', 'product_id'];

}
