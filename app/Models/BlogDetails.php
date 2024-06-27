<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class BlogDetails extends Model
{
    use SoftDeletes;
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_details';

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
        'blog_id',
        'title_no_en', 
        'title_no_sc',
        'title_no_tc', 
        'title_en', 
        'title_sc', 
        'title_tc', 
        'video_url', 
        'image_gallery_id', 
        'desc_en', 
        'desc_sc', 
        'desc_tc', 
        'download1_name_en', 
        'download1_name_sc', 
        'download1_name_tc', 
        'download1_link', 
        'download2_name_en',
        'download2_name_sc',
        'download2_name_tc',
        'download2_link',
        'form_title_en',
        'form_title_sc',
        'form_title_tc', 
        'merchant_banner_img',
        'product_ids',
        'coupon_ids',
        'sort_order_no',
        'image_gallery_alt_text',
        'key_item_ids',
        'highlight_tag_ids',
        'sub_category_id'
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

    public function blogSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
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