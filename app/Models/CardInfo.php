<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'card_name',
        'card_no',
        'expire_date',
        'cvv',
    ];
}