<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrierPage extends Model
{
    use HasFactory;
    protected $fillable = ['title_en', 'title_tc', 'title_sc', 
    'sub_title_en', 'sub_title_sc', 'sub_title_tc', 
    'text_en', 'text_sc', 'text_tc', 'img','email',
    'meta_title_en', 'meta_title_sc', 'meta_title_tc', 'meta_img',
    'meta_description_en', 'meta_description_sc', 'meta_description_tc', 
    ];

}
