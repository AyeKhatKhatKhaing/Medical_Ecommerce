<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChooseMediq extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'choose_mediqs';

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
    protected $fillable = ['main_title_en','main_title_tc','main_title_sc', 'main_content_en', 'main_content_tc', 'main_content_sc', 'main_img', 'main_link_en','main_link_tc','main_link_sc', 'shopping_guide_title_en','shopping_guide_title_tc','shopping_guide_link','shopping_guide_title_sc', 'shopping_guide_img', 'is_translate','quick_start_guide_icon', 'quick_start_guide_title_en','quick_start_guide_title_tc','quick_start_guide_title_sc', 'quick_start_guide_content_en','quick_start_guide_content_tc','quick_start_guide_content_sc', 'quick_start_guide_link_en', 'quick_start_guide_link_tc','quick_start_guide_link_sc','booking_icon', 'booking_title_en','booking_title_tc','booking_title_sc', 'booking_content_en','booking_content_tc','booking_content_sc', 'booking_link_en','booking_link_tc','booking_link_sc'];

    

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
