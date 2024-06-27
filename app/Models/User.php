<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Faq;
use App\Models\ProductImage;
use App\Models\MerchantLocation;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_en',
        'name_sc',
        'name_tc',
        'email',
        'password',
        'phone',
        'is_merchant',
        'banner_img',
        'introduction_en',
        'introduction_sc',
        'introduction_tc',
        'latitude',
        'longitude',
        'icon',
        'gallery',
        'address_tc',
        'address_sc',
        'address_en',
        'mrt_station_name_en',
        'mrt_station_name_sc',
        'mrt_station_name_tc',
        'mrt_station_exit_en',
        'mrt_station_exit_sc',
        'mrt_station_exit_tc',
        'opening_hour',
        'announcement_en',
        'announcement_sc',
        'announcement_tc',
        'is_published',
    ];

    protected static $logAttributes = ['name_en', 'name_sc', 'name_tc', 'email','phone'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('role_id' , 'user_id');
    }

    public function plan_processes(){
        return $this->hasMany('App\Models\PlanProcess');
    }

    public function plan_descriptions(){
        return $this->hasMany('App\Models\PlanDescription');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','merchant_id')->where('products.is_published','=', 1);
    }

    public function merchantLocations(){
        return $this->hasMany(MerchantLocation::class,'merchant_id')->with(['area','merchant']);
    }

    public function galleries(){
        return $this->hasMany(ProductImage::class,'type_id')->where('image_type','merchant');
    }

    public function faq(){
        return $this->hasMany(Merchant_Faq::class,'merchant_id');
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    public function coupons(){
        return $this->hasMany('App\Models\Coupon','merchant_id');
    }
}
