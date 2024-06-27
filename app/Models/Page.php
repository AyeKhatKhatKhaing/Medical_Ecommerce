<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use LogsActivity;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

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
        'name_en','name_tc','name_sc','content_en','content_tc','content_sc','links','user_name','is_published','img','bg_img','is_translate','meta_title_en', 'meta_title_sc', 'meta_title_tc', 'meta_description_en', 'meta_description_sc', 'meta_description_tc', 'meta_image'
    ];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc', 'user_name', 'is_published', 'img', 'is_translate'];

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
