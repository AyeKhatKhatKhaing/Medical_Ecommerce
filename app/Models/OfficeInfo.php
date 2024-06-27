<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeInfo extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'office_name_en',
        'office_name_tc',
        'office_name_sc',
        'address_en', 
        'address_sc', 
        'address_tc', 
        'image', 
        'location', 
    ];

    protected $casts = [
        'image' => 'array',
    ];
}
