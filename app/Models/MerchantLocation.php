<?php

namespace App\Models;

use App\Models\User as Merchant;
use App\Models\Event;
use App\Models\WeekDay;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchantLocation extends Model
{
    use LogsActivity, SoftDeletes, HasFactory;

    protected $table = 'merchant_locations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'area_id',
        'station_name_en',
        'station_name_tc',
        'station_name_sc',
        'full_address_en',
        'full_address_tc',
        'full_address_sc',
        'latitude',
        'longitude',
        'merchant_id'
    ];

    protected static $logAttributes = [
        'area_id',
        'station_name_en',
        'station_name_tc',
        'station_name_sc',
        'full_address_en',
        'full_address_tc',
        'full_address_sc',
        'latitude',
        'longitude',
        'merchant_id'
    ];


    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class,'merchant_id');
    }

    public function weekDays()
    {
        return $this->hasMany(WeekDay::class,'location_id');
    }
    
    public function events()
    {
        return $this->hasMany(Event::class,'location_id');
    }
}
