<?php

namespace App\Models;

use App\Models\Recipient;
use App\Models\CheckUpGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipientItem extends Model
{
    use HasFactory;

    protected $table = 'recipient_items';

    protected $fillable = ['recipient_id', 'product_id', 'check_up_group_id', 'check_up_item_id','edit_status'];

    public function recipient()
    {
        return $this->belongsTo(Recipient::class, 'recipient_id');
    }

    public function group()
    {
        return $this->belongsTo(CheckUpGroup::class, 'check_up_group_id');
    }
}
