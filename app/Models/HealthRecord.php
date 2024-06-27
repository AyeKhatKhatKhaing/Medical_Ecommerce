<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class HealthRecord extends Model
{
    use LogsActivity;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'health_record';

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
    protected $fillable = ['family_member_id','blood_type_id','maritial_status_id','height','weight','drinking',
                            'main_type_of_alcohol_id','amount_of_alcohol_drinking_id','drinking_age','smoking','smoking_age',
                            'no_of_cigarettes_per_day_stick','liver_function','input_abnormal_liver_function_index',
                            'renal_function','input_abnormal_renal_function_index','personal_medicial_history','personal_medicial_history_list',
                            'family_medicial_history','family_medicial_history_list','allergic_history','allergic_history_list', 'is_published'];

    protected static $logAttributes = ['family_member_id', 'is_published'];



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
