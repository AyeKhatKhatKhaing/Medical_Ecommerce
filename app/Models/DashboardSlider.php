<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DashboardSlider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title_en', 'description_en', 'title_tc', 'description_tc', 'title_sc', 'description_sc','sort','img','is_published','is_translate'
    ];
}
