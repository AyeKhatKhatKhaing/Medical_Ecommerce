<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = ['email_title_en',
                           'email_title_tc',
                           'email_title_sc', 
                           'email', 
                           'email_logo', 
                           'hotline_title_en', 
                           'hotline_title_tc', 
                           'hotline_title_sc', 
                           'hotline',
                           'hotline_logo',
                           'whats_up_title_en',
                           'whats_up_title_tc',
                           'whats_up_title_sc',
                           'whats_up',
                           'whats_up_logo',
                           'time_en',
                           'time_tc',
                           'time_sc',
                           'meta_title_tc', 'meta_title_sc', 'meta_title_en',
                           'meta_description_tc', 'meta_description_sc','meta_description_en','meta_img'
                           ];

}
