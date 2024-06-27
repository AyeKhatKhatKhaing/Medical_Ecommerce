<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title_en','title_tc','title_sc',
        'title1_en','title1_tc','title1_sc',
        'description_en','description_tc','description_sc',
        'link_text_en','link_text_tc','link_text_sc','link_en','link_tc','link_sc',
        'image'
    ];
}
