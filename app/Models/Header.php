<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Header extends Model
{
    use LogsActivity;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'headers';

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
        'message_en',
        'message_tc',
        'message_sc',
        'slide_text_en',
        'slide_text_tc',
        'slide_text_sc',
        'content_en',
        'content_tc',
        'content_sc',
        'quick_start_gudie_text_en',
        'quick_start_gudie_text_tc',
        'quick_start_gudie_text_sc',
        'quick_start_gudie_link_en',
        'quick_start_gudie_link_tc',
        'quick_start_gudie_link_sc',
        'help_center_text_en',
        'help_center_text_tc',
        'help_center_text_sc',
        'help_center_link_en',
        'help_center_link_tc',
        'help_center_link_sc',
        'is_translate'
    ];

    protected $casts = [
        'slide_text_en' => 'array',
        'slide_text_tc' => 'array',
        'slide_text_sc' => 'array',
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
