<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpType extends Model
{
    use LogsActivity;
    use SoftDeletes;
    use HasFactory;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_up_types';

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
    protected $fillable = ['name_en', 'name_sc', 'name_tc', 'order_by', 'is_published', 'is_translate', 'updated_by'];

    public function checkUpGroups()
    {
        return $this->belongsToMany(CheckUpGroup::class, 'check_up_type_check_up_group');
    }

    public function checkUpTables()
    {
        return $this->belongsToMany(CheckUpTable::class, 'check_up_table_check_up_type');
    }

    public function checkUpTypeTables()
    {
        return $this->hasMany(CheckUpTableType::class, 'check_up_type_id');
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
