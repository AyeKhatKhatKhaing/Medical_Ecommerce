<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSectionFeature extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function section()
    {
        return $this->belongsTo(BlogSection::class, 'section_id');
    }

    public function blogSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
