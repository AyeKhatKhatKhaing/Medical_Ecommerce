<?php

namespace App\Models;

use DB;
use App\Models\CheckUpItem;
use App\Models\RecipientItem;
use App\Models\CheckTableItem;
use App\Models\CheckTableGroupItem;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckUpGroup extends Model
{
    use SoftDeletes;
    use HasFactory;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'check_up_groups';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $dontReport = [
        //
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 
        'name_sc', 
        'name_tc', 
        'description_en', 
        'description_sc', 
        'description_tc', 
        'check_up_item_id', 
        'number_of_item', 
        'minimum_item', 
        'order_by', 
        'is_published', 
        'is_translate', 
        'updated_by'
    ];

    // protected $appends = ['item_data'];

    public function checkUpItems()
    {
        return $this->hasMany(CheckTableItem::class, 'check_up_group_id');
    }

    public function checkUpTypes()
    {
        return $this->belongsToMany(CheckUpType::class, 'check_up_type_check_up_group');
    }

    public function checkUpTables()
    {
        return $this->belongsToMany(CheckUpTable::class, 'check_table_group_items');
    }

    // public function recipientItems()
    // {
    //     return $this->hasMany(RecipientItem::class, 'check_up_group_id');
    // }

    public function itemDatas($gp_id,$recipient_id,$product_id)
    {
        $item_ids = RecipientItem::where('check_up_group_id',$gp_id)->where('recipient_id',$recipient_id)
        ->where('product_id',$product_id)->pluck('check_up_item_id')->toArray();
        $items = CheckUpItem::whereIn('id',$item_ids)->get();
        return $items;
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
