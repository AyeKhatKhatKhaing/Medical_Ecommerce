<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    protected $table = "weekdays";

    protected $casts = [
        'booking_times' => 'array'
    ];

    protected $fillable = ['booking_times', 'is_time', 'week_days', 'location_id'];
}
