<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilestoneDetail extends Model
{
    use LogsActivity;
    // use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'milestone_details';

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
    protected $fillable = ['milestone_id', 'month_en', 'month_tc', 'month_sc', 'title_en', 'title_tc', 'title_sc', 'description_en', 'description_tc', 'description_sc', 'link'];

    protected static $logAttributes = ['milestone_id', 'month_en', 'title_en' , 'title_sc', 'title_tc'];


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
