<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Footer extends Model
{
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'footers';

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
        'about_content_en',
        'about_content_tc',
        'about_content_sc',
        'about_content_mobile_en',
        'about_content_mobile_tc',
        'about_content_mobile_sc',
        'service_content_en',
        'service_content_tc',
        'service_content_sc',
        'service_content_mobile_en',
        'service_content_mobile_tc',
        'service_content_mobile_sc',
        'membership_content_en',
        'membership_content_tc',
        'membership_content_sc',
        'membership_content_mobile_en',
        'membership_content_mobile_tc',
        'membership_content_mobile_sc',
        'payment_content_en',
        'payment_content_tc',
        'payment_content_sc',
        'payment_content_mobile_en',
        'payment_content_mobile_tc',
        'payment_content_mobile_sc',
        'transaction_content_en',
        'transaction_content_tc',
        'transaction_content_sc',
        'content_en',
        'content_tc',
        'content_sc',
        'img_gallery',
        'is_translate'
    ];



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

}
