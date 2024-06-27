<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;

class Author extends Model
{
    use LogsActivity;
    use SoftDeletes;
    use HasFactory;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'author';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';


    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 
        'name_sc', 
        'name_tc',
        'position_en',
        'position_sc',
        'position_tc', 
        'desc_en',
        'desc_sc',
        'desc_tc', 
        'profile_img',
        'fb_link',
        'twitter_link',
        'linkedin_link', 
        'is_published',
    ];

    protected static $logAttributes = ['name_en', 'name_sc', 'name_tc',  'is_published'];



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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
