<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestPrice extends Model
{
    use HasFactory;
    protected $fillable = ['banner_img', 'banner_title_en', 'banner_description_en',
    'banner_title_tc', 'banner_title_sc', 'banner_description_tc', 'banner_description_sc', 
    'service_title_en','service_title_tc','service_title_sc','service_img',
    'service_subtitle_en','service_subtitle_tc','service_subtitle_sc',
    'service_description_en','service_description_tc','service_description_sc',
    'service_link_text_en','service_link_text_tc','service_link_text_sc',
    'awesome_booking_title_en','awesome_booking_title_tc','awesome_booking_title_sc',
    'meta_title_tc', 'meta_title_sc', 'meta_title_en',
    'meta_description_tc', 'meta_description_sc','meta_description_en','meta_img'];
}
