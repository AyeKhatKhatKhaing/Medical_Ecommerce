<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['name_en', 'name_tc', 'name_sc', 'img', 'content_en', 'content_tc', 'content_sc', 'is_translate', 'is_published', 'updated_by'];

    protected static $logAttributes = ['name_en', 'name_sc', 'name_tc'];

    protected $casts = [
        'img' => 'array',
    ];
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id')->where('sub_categories.is_published','=', 1);
    }
    public function images()
    {
        return $this->hasMany(CategoryImage::class, 'category_id')->orderBy('id');
    }

    // public function desktopImages()
    // {
    //     return $this->hasMany(CategoryImage::class, 'category_id')->where('category_images.type','=', 0);
    // }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')->where('products.is_published','=', 1);
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
