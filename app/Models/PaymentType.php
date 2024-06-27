<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'image', 'description', 'test_mode', 'publishable_key', 'secret_key', 'api_signature', 'status', 'developer_status', 'weight'];
}
