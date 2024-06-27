<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionDecideLater extends Model
{
    protected $table = 'option_decide_laters';
    protected $fillable = ['recipient_id', 'product_id', 'group_id', 'is_decide_later'];
}
