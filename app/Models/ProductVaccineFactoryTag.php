<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVaccineFactoryTag extends Model
{
    use HasFactory;
    protected $fillable = ['vaccine_factory_tag_id','product_id'];

}
