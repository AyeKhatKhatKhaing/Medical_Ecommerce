<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTimeSlotTag extends Model
{
    use HasFactory;
    protected $fillable = ['time_slot_tag_id','product_id'];

}
