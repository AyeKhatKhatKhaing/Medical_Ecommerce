<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeyItemTag extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'key_item_tags';

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
    protected $fillable = ['name_en', 'name_tc', 'name_sc', 'content_en', 'content_tc', 'content_sc', 'img', 'updated_by', 'is_translate','is_published'];

    protected static $logAttributes = ['name_en', 'name_sc', 'name_tc'];

    public function subKeyItemTags()
    {
        return $this->hasMany(SubKeyItemTag::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_key_item_tags')->withPivot('key_item_tag');
    }

    public function count_product_key_item($id)
    {
        $productIDs = ProductKeyItemTag::where('key_item_tag_id',$id)->pluck('product_id')->toArray();
        $product_key_item = Product::whereIn('id',$productIDs)->where('is_published', 1)->count();
        // dd($product_product_highlight);
        return $product_key_item;
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
