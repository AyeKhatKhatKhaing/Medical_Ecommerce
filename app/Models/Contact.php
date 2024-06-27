<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

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
    protected $fillable = ['help1_icon', 'help1_name_en', 'help1_name_tc', 'help1_name_sc', 'help1_description_en', 'help1_description_tc', 'help1_description_sc', 'help1_link', 'help1_link_text', 'help2_icon', 'help2_name_en', 'contact_us_footer_img1','contact_us_footer_img2','contact_us_footer_img3','contact_us_header_img','help2_name_tc', 'help2_name_sc', 'help2_description_en', 'help2_description_tc', 'help2_description_sc', 'help2_link', 'help2_link_text', 'help3_icon', 'help3_name_en', 'help3_name_tc', 'help3_name_sc', 'help3_description_en', 'help3_description_tc', 'help3_description_sc', 'help3_link', 'help3_link_text', 'online_payment', 'office_photo', 'payment_method1_icon', 'payment_method1_name_en', 'payment_method1_name_tc', 'payment_method1_name_sc', 'payment_method1_description_en', 'payment_method1_description_tc', 'payment_method1_description_sc', 'payment_method2_icon', 'payment_method2_name_en', 'payment_method2_name_tc', 'payment_method2_name_sc', 'payment_method2_description_en', 'payment_method2_description_tc', 'payment_method2_description_sc', 'online_payment_img','offline_payment_img','contact_title_en','contact_title_tc','contact_title_sc','contact_img','contact_description_en','contact_description_tc','contact_description_sc'];

    protected $casts = [
        'online_payment_img' => 'array',
        'offline_payment_img' => 'array',
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
