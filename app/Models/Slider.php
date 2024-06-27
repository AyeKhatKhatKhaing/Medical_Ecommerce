<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends Model
{
    use SoftDeletes;
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

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
    protected $fillable = ['name', 'img','mobile_img','is_published', 'sort_order', 'time_setup', 'video', 'slider_type', 'page_type', 'page_id', 'user_id', 'link', 'updated_by'];

    protected static $logAttributes = ['name','is_published', 'sort_order', 'time_setup', 'video', 'slider_type', 'page_type', 'page_id', 'user_id', 'link'];


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

    public function page()
    {
        return $this->hasMany(Page::class,"page_type","id");
    }

    public function getSliderTypeAttribute($val)
    {
        if($val==0)
        {
            return 'Image';
        }
        else
        {
            return 'Video';
        }
    }
}
