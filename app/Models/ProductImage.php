<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductImage extends Model
{
    use LogsActivity;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

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
    protected $fillable = ['image_type', 'type_id', 'creator_type', 'img','feature_images', 'common_area', 'video', 'services_facilities', 'other', 'updated_by'];

    protected $casts = [
        'feature_images' => 'array',
        'common_area' => 'array',
        'services_facilities' => 'array',
        'other' => 'array',
        'video' => 'array',
    ];

    protected static $logAttributes = ['type_id', 'creator_type'];

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
