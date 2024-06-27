<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqPage extends Model
{
    use HasFactory;

    protected $fillable = [
    'banner_img', 'banner_title_en',
    'banner_title_tc', 'banner_title_sc', 
    'button1_title_en','button1_title_tc','button1_title_sc','button1_img',
    'button2_title_en','button2_title_tc','button2_title_sc','button2_img',
    'button3_title_en','button3_title_tc','button3_title_sc','button3_img',
    'title1_en','title1_tc','title1_sc',
    'title2_en','title2_tc','title2_sc',
    'contact1_en','contact1_tc','contact1_sc',
    'contact2_en','contact2_tc','contact2_sc',
    'contact3_en','contact3_tc','contact3_sc',
    'meta_title_tc', 'meta_title_sc', 'meta_title_en',
    'meta_description_tc', 'meta_description_sc','meta_description_en','meta_img'];
}
