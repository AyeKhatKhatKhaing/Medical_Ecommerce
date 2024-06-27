<?php

namespace App\Models;

use App\Models\MerchantLocation;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas';

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
    protected $fillable = ['name_en', 'name_tc','is_published', 'name_sc', 'district_id', 'updated_by', 'latitude', 'longitude', 'location_marker', 'is_translate'];

    protected static $logAttributes = ['name_en', 'name_tc','is_published', 'name_sc', 'district_id', 'updated_by', 'latitude', 'longitude', 'location_marker', 'is_translate'];


    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */

    public function merchantLocation()
    {
        return $this->hasOne(MerchantLocation::class,'area_id')->with("weekDays","events");
    }
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

}
