<?php

namespace App\Models;

use App\Models\District;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'name',
        'address',
        'country',
        'territory_id',
        'district_id',
        'area_id',
        'save_info',
        'special_request',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }

    public function territory()
    {
        return $this->belongsTo(Territory::class,'territory_id');
    }

}