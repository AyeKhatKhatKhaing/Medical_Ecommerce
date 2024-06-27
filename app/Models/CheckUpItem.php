<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpItem extends Model
{
    use LogsActivity;
    use SoftDeletes;
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_up_items';

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
        'name_en',
        'name_sc',
        'name_tc',
        'content_en',
        'content_sc',
        'content_tc',
        'gender',
        'number_of_item',
        'equivalent_number',
        'order_by',
        'is_published',
        'is_translate',
        'updated_by'
    ];

    public function checkUpGroups()
    {
        return $this->belongsToMany(CheckUpGroup::class,  'check_up_group_check_up_item');
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
