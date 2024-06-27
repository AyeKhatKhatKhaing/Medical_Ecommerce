<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKeyItemTag extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_key_item_tags';

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
    protected $fillable = ['name_en', 'name_tc', 'name_sc', 'key_item_tag_id', 'updated_by', 'is_translate','is_published'];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc', 'key_item_tag_tag'];

    public function subKeyItemTags()
    {
        return $this->belongsToMany(SubKeyItemTag::class,'product_key_item_tags')->withPivot('sub_key_item_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_key_item_tags')->withPivot('sub_key_item_tag');
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
