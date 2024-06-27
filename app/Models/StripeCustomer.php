<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'stripe_customer_id',
        'card_type',
        'digit',
    ];
}
