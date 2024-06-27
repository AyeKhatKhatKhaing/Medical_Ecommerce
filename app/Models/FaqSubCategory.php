<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqSubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['category_id','sub_name_en', 'sub_name_sc', 'sub_name_tc', 'is_published', 'updated_by', 'is_translate'];

    public function faqs()
    {
        return $this->hasMany(Faq::class,'sub_category_id')->where('faqs.is_published','=', 1);
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class,'category_id');
    }
}
