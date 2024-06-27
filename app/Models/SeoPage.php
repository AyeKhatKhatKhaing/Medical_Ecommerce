<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'meta_title_tc', 'meta_title_sc', 'meta_title_en',
    'url_tc', 'url_sc', 'url_en',
    'meta_description_tc', 'meta_description_sc','meta_description_en','meta_image'];
}
