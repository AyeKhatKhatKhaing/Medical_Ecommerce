<?php

namespace App\Models;

use App\Models\FaqLike;
use App\Models\BillingInfo;
use App\Models\FamilyMember;
use App\Models\StripeCustomer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'profile_img',
        'email',
        'google_id',
        'facebook_id',
        'phone',
        'dob',
        'gender',
        'password',
        'remember_token',
        'referral_code',
        'country',
        'territory_id',
        'district_id',
        'area_id',
        'total_balance',
        'is_blocked',
        'activation_code',
        'is_verified',
        'address',
        'title_full_name',
        'full_name',
        'user_name',
        'email_is_verified',
    ];

    protected static $logAttributes = ['first_name', 'last_name', 'email', 'phone'];

    protected $hidden = ['password', 'remember_token'];

    public function saveCusomter($request): self
    {
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->save();

        return false;
    }

    public function fovourite() {
        return $this->hasMany(ProductFavourite::class, 'customer_id');
    }

    public function familyMembers() 
    {
        return $this->hasMany(FamilyMember::class, 'customer_id');
    }

    public function stripeCustomers() 
    {
        return $this->hasMany(StripeCustomer::class, 'customer_id');
    }
    public function billingInfo()
    {
        return $this->hasMany(BillingInfo::class,'customer_id')->where('save_info',true)->latest()->first();
    }

    public function user_liked()
    {
        return $this->hasMany(FaqLike::class, 'customer_id');
    }

    public function subscriber()
    {
        $subscriber = CustomerNotification::where("customer_id",auth()->guard('customer')->user()->id)
        ->where('custom_notification_id', 1)
        ->where('notification_type_id', 2)
        ->first();
        return $subscriber;
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }


    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

}
