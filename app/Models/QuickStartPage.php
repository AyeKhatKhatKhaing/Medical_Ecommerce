<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickStartPage extends Model
{
    use HasFactory;
    protected $fillable = ['meta_title_tc', 'meta_title_sc', 'meta_title_en',
    'meta_description_tc', 'meta_description_sc','meta_description_en','meta_img'];
}
