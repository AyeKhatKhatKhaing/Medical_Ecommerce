<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empower extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'empower_title_en','empower_title_tc','empower_title_sc',
        'empower_sub_title1_en','empower_sub_title1_tc','empower_sub_title1_sc',
        'empower_text1_en','empower_text1_tc','empower_text1_sc',
        'empower_sub_title2_en','empower_sub_title2_tc','empower_sub_title2_sc',
        'empower_text2_en','empower_text2_tc','empower_text2_sc',
        'empower_sub_title3_en','empower_sub_title3_tc','empower_sub_title3_sc',
        'empower_text3_en','empower_text3_tc','empower_text3_sc',
        'empower_sub_title4_en','empower_sub_title4_tc','empower_sub_title4_sc',
        'empower_text4_en','empower_text4_tc','empower_text4_sc',
        'empower_logo1','empower_logo2','empower_logo3','empower_logo4',
    ];

}
