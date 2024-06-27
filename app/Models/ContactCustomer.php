<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'first_name',
        'phone_number',
        'business_email',
        'company_name',
        'company_size',
        'serviceOption',
        'budget',
        'message',
    ];
}
