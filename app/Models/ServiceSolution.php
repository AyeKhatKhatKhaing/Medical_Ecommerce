<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSolution extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_solutions';

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
    protected $fillable = ['main_title_en', 'main_title_tc', 'main_title_sc','description_en','description_tc','description_sc', 'main_sub_title_en', 'main_sub_title_tc', 'main_sub_title_sc','is_translate', 'img','title_img','is_published', 'title_en', 'title_tc', 'title_sc', 'sub_title_en', 'sub_title_tc', 'sub_title_sc', 'content_en', 'content_tc', 'content_sc'];

    

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
