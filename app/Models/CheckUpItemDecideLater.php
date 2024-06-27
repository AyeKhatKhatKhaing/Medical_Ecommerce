<?php

namespace App\Models;

use App\Models\Recipient;
use App\Models\CheckUpGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpItemDecideLater extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_id', 
        'group_id', 
        'decide_later', 
    ];

    public function recipient()
    {
        return $this->belongsTo(Recipient::class,'recipient_id');
    }
    public function group()
    {
        return $this->belongsTo(CheckUpGroup::class,'group_id');
    }
}
