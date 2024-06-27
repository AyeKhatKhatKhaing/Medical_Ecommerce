<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Faq extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

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
    protected $fillable = ['name_en', 'name_sc', 'name_tc', 'content_en', 'content_tc', 'content_sc', 'category_id', 'sub_category_id','order_by', 'is_published',  'is_popular','is_translate', 'updated_by'];

    protected static $logAttributes = ['name_en', 'name_sc', 'name_tc', 'category_id', 'order_by', 'is_published', 'is_translate', 'updated_by'];

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function category()
    {
        return $this->belongsTo(FaqCategory::class,'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(FaqSubCategory::class,'sub_category_id');
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

}
