<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $fillable = [
    'banner_img', 'banner_title_en', 'banner_description_en',
    'banner_title_tc', 'banner_title_sc', 'banner_description_tc', 'banner_description_sc', 
    'benefit_title_en','benefit_title_tc','benefit_title_sc',
    'help_title_en','help_title_tc','help_title_sc',
    'three_step_title_en','three_step_title_tc','three_step_title_sc',
    'three_step_text_en','three_step_text_tc','three_step_text_sc',
    'benefit_text1_en','benefit_text1_tc','benefit_text1_sc','benefit1_img',
    'benefit_text2_en','benefit_text2_tc','benefit_text2_sc','benefit2_img',
    'benefit_text3_en','benefit_text3_tc','benefit_text3_sc','benefit3_img',
    'step1_title_en','step1_title_tc','step1_title_sc',
    'step1_description_en','step1_description_tc','step1_description_sc','step1_img',
    'step2_title_en','step2_title_tc','step2_title_sc',
    'step2_description_en','step2_description_tc','step2_description_sc','step2_img',
    'step3_title_en','step3_title_tc','step3_title_sc',
    'step3_description_en','step3_description_tc','step3_description_sc','step3_img',
    'contact_us_text1_en','contact_us_text1_tc','contact_us_text1_sc',
    'contact_us_text2_en','contact_us_text2_tc','contact_us_text2_sc','contact_us_img',
    'percent','percent_text_en','percent_text_tc','percent_text_sc',
    'meta_title_tc', 'meta_title_sc', 'meta_title_en',
    'meta_description_tc', 'meta_description_sc','meta_description_en','meta_img'];
}
