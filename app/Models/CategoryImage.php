<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'category_id',
        'title_en',
        'title_tc',
        'title_sc',
        'type',
        'image',
        'imageM'
    ];
}
