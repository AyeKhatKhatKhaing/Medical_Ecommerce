<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class CouponBanner extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupon_banner';

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
    protected $fillable = 
        [
            'name_en',
            'name_tc',
            'name_sc',
            'description_en',
            'description_sc',
            'description_sc',
            'img', 
            'updated_by', 
            'is_published', 
            'is_translate',
            'meta_title_en',
            'meta_title_tc',
            'meta_title_sc',
            'meta_description_en',
            'meta_description_sc',
            'meta_description_sc',
            'meta_img', 
            'mobile_img', 
            'birthday_img', 
            'welcome_img', 
        ];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc'];
    

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
