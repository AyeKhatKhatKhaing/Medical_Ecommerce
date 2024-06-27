<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckTableGroupItem extends Model
{
    use HasFactory;

    protected $table = 'check_table_group_items';

    protected $fillable = [
        'check_up_table_id',
        'check_up_type_id',
        'check_up_group_id',
        'check_up_item_id',
    ];
}
