<?php

namespace App\Models;

use App\Models\TableColumn;
use App\Models\TableHeader;
use App\Models\CheckUpTable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';

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
        'name_en', 'name_tc', 'name_sc',
        'content_en', 'content_tc', 'content_sc',
        'merchant_id','sku','number_of_item','card_name_en','card_name_tc','card_name_sc','is_table',
        'media_type', 'img', 'video', 'check_up_table_id', 'is_published', 'is_translate'
    ];

    public function checkupTable()
    {
        return $this->belongsTo(CheckUpTable::class,'check_up_table_id');
    }

    public function tableHeaders()
    {
        return $this->hasMany(TableHeader::class,'package_id');
    }

    public function tableTitles()
    {
        return $this->hasMany(TableTitle::class, 'package_id');
    }

    // public function tableColumns()
    // {
    //     return $this->hasMany(TableColumn::class, 'package_id');
    // }

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
