<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Product;
use App\Models\Customer;
use App\Models\AddOnItem;
use App\Models\CheckUpGroup;
use App\Models\RecipientItem;
use App\Models\CheckUpTableType;
use App\Models\RecipientAddOnItem;
use Illuminate\Support\Facades\Route;
use App\Models\CheckUpItemDecideLater;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Recipient extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'location', 
        'date', 
        'time', 
        'customer_id',
        'product_id', 
        'variable_id', 
        'cart_id', 
        'each_recipient_amount', 
        'title', 
        'first_name', 
        'last_name', 
        'phone', 
        'is_optional_decide_later', 
        'is_add_on_decide_later',
        'is_prefer_time_decide_later',
        'add_on_prices',
        'is_ordered_checkout',
        'remark',
        'confirm_booking_date',
        'confirm_booking_time',
        'have_referral',
        'file_upload',
        'message',
        'edit_location',
        'edit_date',
        'edit_time'
    ];
    
    protected static $logAttributes = ['location', 'date', 'time', 'product_id', 'is_optional_decide', 'is_add_on_decide_later'];

    protected $appends = ['group_data','add_on_data'];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variable_product()
    {
        return $this->belongsTo(ProductVariation::class, 'variable_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function recipient_add_on_items()
    {
        return $this->hasMany(RecipientAddOnItem::class, 'recipient_id');
    }

    public function recipient_items()
    {
        return $this->hasMany(RecipientItem::class, 'recipient_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'location');
    }

    public function checkUpItemDecideLater()
    {
        return $this->hasMany(CheckUpItemDecideLater::class,'recipient_id');
    }

    public function getGroupDataAttribute()
    {
        try{
            $route = Route::getRoutes()->match(\Request::create(\URL::previous()));
        }catch(\Exception $e){
            $route = null;
        }
        if($route != null && $route->getName() == "checkout.init" && Route::current()->getName() != 'checkout.info'){
            $group_Ids = $this->recipient_items()->pluck('check_up_group_id')->toArray();
            $groups = CheckUpGroup::whereIn('id',$group_Ids)->get();
        }else{
            $checkUpTable = $this->product->package->checkupTable;
            $group_Ids = CheckUpTableType::where('check_up_table_id',$checkUpTable->id)->where('check_up_type_id',2)->pluck('check_up_group_id')->toArray();
            $groups = CheckUpGroup::whereIn('id',$group_Ids)->get();
        }
        return $groups;
    }

    public function getAddOnDataAttribute()
    {
        $addon_ids = $this->recipient_add_on_items()->pluck('add_on_item_id')->toArray();
        $addOnItems = AddOnItem::whereIn('id',$addon_ids)->get();
        return $addOnItems;
    }

    public function getaddon($recipient_id)
    {
        $addon_ids =RecipientAddOnItem::where('recipient_id',$recipient_id)->pluck('add_on_item_id')->toArray();
        $addOnItems = AddOnItem::whereIn('id',$addon_ids)->get();
        return $addOnItems;
    }

    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }
}
