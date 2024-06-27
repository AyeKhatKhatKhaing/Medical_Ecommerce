<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Blog extends Model
{
    use SoftDeletes;
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'category_id', 
        'tag_id',
        'related_keywords', 
        'is_home_featured', 
        'slug_en', 
        'slug_sc', 
        'slug_tc', 
        'title_en', 
        'title_sc', 
        'title_tc', 
        'desc_en', 
        'desc_sc', 
        'desc_tc', 
        'main_image_url', 
        'is_popular', 
        'should_lookat_product_category_id',
        'recommended_blog_id',
        't_and_c_content_en',
        't_and_c_content_sc',
        't_and_c_content_tc',
        'related_products_sub_category_id',
        'is_published', 
        'created_person',
        'updated_person',
        'source_title_en',
        'source_title_sc',
        'source_title_tc',
        'source_title_link',
        'meta_title_en',
        'meta_title_sc',
        'meta_title_tc',
        'meta_description_en',
        'meta_description_sc',
        'meta_description_tc',
        'meta_image',
        'main_image_alt_text'
    ];

    protected static $logAttributes = ['title_en', 'title_sc', 'title_tc'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function blogTag()
    {
        return $this->belongsTo(BlogTag::class, 'tag_id');
    }

    public function blogAuthor()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function blogDetails()
    {
        return $this->hasMany('App\Models\BlogDetails',"blog_id")->orderByRaw('CONVERT(sort_order_no, SIGNED) asc');
    }

    public function sections()
    {
        return $this->hasMany(BlogSection::class);
    }

    public function blogSubCategory()
    {
        return $this->belongsTo(SubCategory::class,"should_lookat_product_category_id");
    }



    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}