<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'homes';

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
        'onsale_banner_title_en',
        'onsale_banner_title_tc',
        'onsale_banner_title_sc',
        'onsale_banner_img',
        'banner_title_en',
        'banner_title_tc',
        'banner_title_sc',
        'banner_img_en',
        'banner_img_tc',
        'banner_img_sc',
        'banner_img_url',
        'promotion_title_en',
        'promotion_title_tc',
        'promotion_title_sc',
        'promotion_img',
        'member_reward_title_en',
        'member_reward_title_tc',
        'member_reward_title_sc',
        'member_reward_img_en',
        'member_reward_img_tc',
        'member_reward_img_sc',
        'popup_img_en',
        'popup_img_tc',
        'popup_img_sc',
        'popup_img_url',
        'cookies_text_en',
        'cookies_text_tc',
        'cookies_text_sc',
        'is_published',
        'is_translate'

    ];

    // protected $casts = [
    //     'member_reward_img_en' => 'array',
    //     'member_reward_img_tc' => 'array',
    //     'member_reward_img_sc' => 'array'
    // ];

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
