<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsePromoCode extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'promo_code_id',
    ];
}
