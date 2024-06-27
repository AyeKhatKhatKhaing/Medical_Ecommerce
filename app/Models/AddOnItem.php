<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddOnItem extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'add_on_items';

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
    protected $fillable = 
        [
            'name_en',
            'name_tc',
            'name_sc',
            'merchant',
            'gender',
            'code',
            'original_price',
            'discount_price',
            'recommend_item',
            'description_en',
            'description_tc',
            'description_sc',
            'img', 
            'updated_by', 
            'is_published', 
            'is_translate'
        ];

    protected static $logAttributes = ['name_en', 'name_tc', 'name_sc', 'price'];
    
    public function merchantVal()
    {
        return $this->belongsTo(User::class,'merchant');
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
