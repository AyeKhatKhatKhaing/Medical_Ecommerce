<?php

namespace App\Models;

use App\Models\CheckTableItem;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpTable extends Model
{
    use LogsActivity;
    use SoftDeletes;
    use HasFactory;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_up_tables';

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
        'order_by', 
        'is_published', 
        'is_translate', 
        'updated_by',
        'check_up_type_id',
        'check_up_group_id',
        'check_up_item_id',
    ];

    protected $appends = ['check_up_type_val'];
    // public function checkUpTypes()
    // {
    //     return $this->belongsToMany(CheckUpType::class, 'check_up_table_check_up_type');
    // }

    public function checkUpTypes()
    {
        return $this->belongsToMany(CheckUpType::class, 'check_table_group_items');
    }

    public function checkUpGroups()
    {
        return $this->belongsToMany(CheckUpGroup::class, 'check_table_group_items');
    }

    public function checkUpItems()
    {
        return $this->hasMany(CheckTableItem::class, 'check_up_table_type_id');
    }

    public function checkUpTableGroupItems()
    {
        return $this->belongsToMany(CheckTableGroupItem::class, 'check_table_group_items');
    }

    public function checkUpTypeTables()
    {
        return $this->hasMany(CheckUpTableType::class);
    }

    public function getCheckUpTypeValAttribute()
    {
        $checkUpTableId = $this->checkUpTypeTables->pluck('check_up_type_id');
        return CheckUpType::whereIn('id',$checkUpTableId)->orderBy('created_at','asc')->get();
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
