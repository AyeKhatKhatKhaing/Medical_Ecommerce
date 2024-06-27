<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqLike extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'faq_id', 'like_status'];

}
