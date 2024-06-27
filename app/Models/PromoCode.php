<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class PromoCode extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promo_codes';

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
        'code',
        'product_category_id', 
        'name_en', 
        'name_tc',
        'name_sc', 
        'description_en', 
        'description_tc',
        'description_sc', 
        'terms_en', 
        'terms_tc',
        'terms_sc', 
        'is_translate', 
        'amount', 
        'start_date', 
        'end_date', 
        'user_limit', 
        'use_limit',
        'icon', 
        'is_published', 
        'updated_by'
    ];

    

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
