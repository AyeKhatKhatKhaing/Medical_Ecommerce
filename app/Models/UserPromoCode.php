<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'promo_code_id',
        'use_count',
    ];
}
