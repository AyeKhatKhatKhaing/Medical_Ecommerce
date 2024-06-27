<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_categories';

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
    protected $fillable = ['category_id', 'name_en', 'name_tc', 'name_sc', 'img', 'is_published', 'is_translate', 'content_en', 'content_tc', 'content_sc', 'updated_by','is_published','is_home','sort_by'];

    protected static $logAttributes = ['category_id', 'name_en', 'name_tc', 'name_sc'];


    public function products()
    {
        return $this->hasMany(Product::class,'sub_category_id')->where('products.is_published','=', 1);
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
