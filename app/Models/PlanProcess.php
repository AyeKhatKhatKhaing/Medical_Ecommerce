<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PlanProcess extends Model
{
    use HasFactory;
    // use LogsActivity;
    use SoftDeletes;

    protected $table = 'plan_processes';

    protected $primaryKey = 'id';

    protected $fillable = ['merchant_id', 'name_en', 'name_tc', 'name_sc', 'content_en', 'content_tc', 'content_sc'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }



    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
