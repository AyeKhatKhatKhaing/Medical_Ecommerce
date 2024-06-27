<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abouts';

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
    protected $fillable = ['banner_img', 'banner_title_en', 'banner_description_en', 'cooperation_img', 
    'cooperation_title_en', 'cooperation_description_en', 'group_img', 'group_title_en', 
    'group_description_en', 'group_description_tc', 'group_description_sc',
    'mission_and_vision_description_en', 'updated_by', 'meta_title_en', 'meta_description_en', 'meta_img',
    'banner_title_tc', 'banner_title_sc', 'banner_description_tc', 'banner_description_sc', 'cooperation_title_tc',
    'cooperation_link_text1_en','cooperation_link_text1_tc','cooperation_link_text1_sc',
    'cooperation_link_text2_en','cooperation_link_text2_tc','cooperation_link_text2_sc',
    'group_link_text1_en','group_link_text1_tc','group_link_text1_sc',
    'cooperation_link1','cooperation_link2','group_link1','rewards_title_en','rewards_title_tc','rewards_title_sc','rewords_img','footer_img1','footer_img2','footer_img3',
    'cooperation_title_sc', 'cooperation_description_tc', 'cooperation_description_sc', 'group_title_tc', 'group_title_sc', 'mission_and_vision_description_tc', 'mission_and_vision_description_sc',
    'meta_title_tc', 'meta_title_sc', 'meta_description_tc', 'meta_description_sc'];
    protected static $logAttributes = ['banner_title_en', 'cooperation_title_en', 'group_title_en', 'meta_title_en'];


    protected $casts = [
        'rewords_img' => 'array',
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
