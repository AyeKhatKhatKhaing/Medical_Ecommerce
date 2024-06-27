<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchantArea extends Model
{
    use LogsActivity, SoftDeletes, HasFactory;

    protected $table = 'merchant_areas';

    protected $primaryKey = 'id';

    protected $fillable = [
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
}
