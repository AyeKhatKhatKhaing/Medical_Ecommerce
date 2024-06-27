<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipientAddOnItem extends Model
{
    use HasFactory;

    protected $table ='recipient_add_on_items';

    protected $fillable = ['recipient_id', 'product_id', 'add_on_item_id'];
}

