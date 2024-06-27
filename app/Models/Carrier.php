<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Carrier extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carriers';

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
    protected $fillable = ['name_en', 'name_sc', 'name_tc', 'content_en', 'content_sc', 'content_tc', 'slug_en', 'slug_sc', 'slug_tc', 'img', 'department_id', 'location', 'employment_type', 'minimum_experience_en','minimum_experience_tc','minimum_experience_sc','exp_level', 'sort_by', 'is_published', 'is_translate', 'updated_by'];
    // protected static $logAttributes = ['location'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'location');
    }

    public function department()
    {
        return $this->belongsTo(CarrierDepartment::class, 'department_id');
    }

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
