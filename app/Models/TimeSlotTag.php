<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductTimeSlotTag;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlotTag extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'time_slot_tags';

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
    protected $fillable = ['name_en', 'name_tc', 'name_sc', 'content_en', 'content_tc', 'content_sc','remind_notice_en', 'remind_notice_tc', 'remind_notice_sc', 'img', 'updated_by', 'is_translate','is_published'];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_time_slot_tags');
    }
    public function product_time_slot_tags()
    {
        return $this->hasMany('App\Models\ProductTimeSlotTag','time_slot_tag_id');
    }
    public function count_product_time_slot($id)
    {
        $productIDs = ProductTimeSlotTag::where('time_slot_tag_id',$id)->pluck('product_id')->toArray();
        $product_time_slot = Product::whereIn('id',$productIDs)->where('is_published', 1)->count();
        // dd($product_highlight);
        return $product_time_slot;
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
