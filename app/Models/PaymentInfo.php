<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;
    protected $fillable = ['name', 
    'bank1_logo', 
    'bank1_name_en', 
    'bank1_name_tc', 
    'bank1_name_sc',
    'bank1_info_en', 
    'bank1_info_tc', 
    'bank1_info_sc',
    'bank2_logo', 
    'bank2_name_en', 
    'bank2_name_tc', 
    'bank2_name_sc',
    'bank2_info_en', 
    'bank2_info_tc', 
    'bank2_info_sc', 
    'bank3_logo', 
    'bank3_name_en', 
    'bank3_name_tc', 
    'bank3_name_sc',
    'bank3_info_en', 
    'bank3_info_tc', 
    'bank3_info_sc', 
    'bank4_logo', 
    'bank4_name_en', 
    'bank4_name_tc', 
    'bank4_name_sc',
    'bank4_info_en', 
    'bank4_info_tc', 
    'bank4_info_sc', 
    'checkout_3_title_en',
    'checkout_3_title_tc',
    'checkout_3_title_sc',
    'checkout_3_desc_en',
    'checkout_3_desc_tc',
    'checkout_3_desc_sc',
    'is_translate', 
    ];
}
