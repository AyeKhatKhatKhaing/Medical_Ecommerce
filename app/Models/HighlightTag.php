<?php

namespace App\Models;

use App\Models\Product;
use Spatie\Activitylog\LogOptions;
use App\Models\ProductHighlightTag;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class HighlightTag extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'highlight_tags';

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

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_highlight_tags');
    }
    public function product_highlight_tags()
    {
        return $this->hasMany('App\Models\ProductHighlightTag','highlight_tag_id');
    }
    public function count_product_highlight($id)
    {
        $productIDs = ProductHighlightTag::where('highlight_tag_id',$id)->pluck('product_id')->toArray();
        $product_highlight = Product::whereIn('id',$productIDs)->where('is_published', 1)->count();
        // dd($product_product_highlight);
        return $product_highlight;
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
