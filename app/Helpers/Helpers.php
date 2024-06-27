<?php


use App\Models\Coupon;
use App\Models\OnSale;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\CheckUpGroup;
use App\Models\CouponProduct;
use App\Models\CheckTableItem;
use App\Models\CouponCategory;
use App\Models\CheckUpTableType;
use App\Models\CouponSubCategory;
use App\Models\PromotionCampaign;
use Illuminate\Support\Collection;
use App\Models\CouponExSubCategory;
use App\Models\FamilyMember;
use Spatie\Activitylog\Models\Activity;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Carbon\Carbon;

function lang()
{
    $lang = request()->segment(1);

    if ($lang == "zh-cn") {
        return $lang;
    } elseif ($lang == "en") {
        return $lang;
    }

    return "zh-hk";
}

function langbind($obj, $value)
{
    $lang = lang();
    // $lang = str_replace("cn", "tc", $lang);
    if($lang == 'zh-cn'){
        $lang = 'sc';
    }
    elseif($lang == 'zh-hk'){
        $lang = 'tc';
    }
    $value = $value."_".$lang;
    if($obj) {
        return $obj->$value;
    }
    return "";
}


function langLink($route)
{
    $lng = request()->segment(1);
    if ($lng == "en" || $lng == "zh-hk" || $lng == "zh-cn") {
       return "/".$lng."/".$route;
    }else{
       return "/".'zh-hk'."/".$route;
    }
    
}

function existImagePath($imgPath)
{
    $img_path = isset($imgPath) ? parse_url($imgPath) : null;
    $img = isset($img_path) ? $img_path['path'] : '';
    return file_exists(public_path($img));
}


function getImage($image)
{
    $img = isset($image) ? parse_url($image) : null;
    $img_path = isset($img) ? $img['path'] : '';
    return $img_path;
}

function autoTranslate($status, $fields)
{
    if($status == 1) {
        $target = new GoogleTranslate('zh-CN');
        $target->setSource('zh-TW');
        $arr = [];
        foreach ($fields as $key => $f) {
            if(is_array($f)) {
                $sub_arr = [];
                foreach ($f as $field) {
                    if ($field !== null && strlen($field) < 5000) {
                        array_push($sub_arr, $target->translate($field));
                    } else {
                        array_push($sub_arr, '');
                    }
                }
                $arr[$key] = $sub_arr;
            } else {
                if ($f !== null && strlen($f) < 5000) {
                    $arr[$key] = $target->translate($f);
                } else {
                    $arr[$key] = '';
                }
            }

        }
        return $arr;
    } else {
        return [];
    }
}

function autoTranslateToEng($status, $fields)
{
    if($status == 1) {
        $target = new GoogleTranslate();
        $target->setSource();
        $arr = [];
        foreach ($fields as $key => $f) {
            if(is_array($f)) {
                $sub_arr = [];
                foreach ($f as $field) {
                    if ($field !== null && strlen($field) < 5000) {
                        array_push($sub_arr, $target->translate($field));
                    } else {
                        array_push($sub_arr, '');
                    }
                }
                $arr[$key] = $sub_arr;
            } else {
                if ($f !== null && strlen($f) < 5000) {
                    $arr[$key] = $target->translate($f);
                } else {
                    $arr[$key] = '';
                }
            }

        }
        return $arr;
    } else {
        return [];
    }
}

function getOldActivityLogsData($activity)
{
    $properties_array = json_decode($activity->properties, JSON_PRETTY_PRINT);
    $old_data         = '';
    if(isset($properties_array) && $properties_array != [] && isset($properties_array['old'])) {
        foreach($properties_array['old'] as $key => $data) {
            $old_data    .= '<span>'. $key .': </span>';
            $old_data    .= '<span class="text-muted">'.$data.'</span>';
        }
    } else {
        $old_data = '-';
    }

    return $old_data;
}

function getNewActivityLogsData($activity)
{
    $properties_array = json_decode($activity->properties, JSON_PRETTY_PRINT);
    $new_data         = '';

    if(isset($properties_array) && $properties_array != []) {
        foreach($properties_array['attributes'] as $key => $data) {
            $new_data    .= '<span>'. $key .': </span>';
            $new_data    .= '<span class="text-muted">'.$data.'</span>';
        }
    } else {
        $new_data = '-';
    }

    return $new_data;
}

function productTagVal($product)
{
    $table_ids = Package::where('id', $product->check_up_package_id)->pluck('check_up_table_id')->toArray();
    $group_ids = CheckUpTableType::whereIn('check_up_table_id', $table_ids)->where('check_up_type_id',1)->pluck('check_up_group_id')->toArray();
    $groups = CheckUpGroup::whereIn('id', $group_ids)->get();

    $allTags = $product->recommend_tag_data_arr->toBase()
    ->merge($product->vaccine_factory_tag_data_arr)
    ->merge($product->key_item_tag_data_arr)
    ->merge($product->hightlight_tag_data_arr)
    ->merge($groups);
    return $allTags;
}

function getCheckUpTableGroup($productDetails)
{
    $checkuptable =  $productDetails->package ? $productDetails->package->checkupTable : null;
    $tableGroups = [];
    if($checkuptable != null) {
        $tableGroupIds =  CheckUpTableType::where('check_up_table_id', $checkuptable->id)
        ->where('check_up_type_id', 1)->pluck('check_up_group_id')->toArray();
        $tableGroups = CheckUpGroup::whereIn('id', $tableGroupIds)->get();

    }
    return $tableGroups;

}

function getTotalCoupon($product_id, $category_id, $sub_category_id , $is_mediq_coupon = null)
{
    $product = Product::where('id',$product_id)->first();
    $totalCoupons = [];
    $fromDate = Carbon::now();
    if($is_mediq_coupon != null){
        $getCoupons = Coupon::whereIsPublished(true)->whereHas('couponCategories',function($q) use($category_id){
            return $q->where('category_id',$category_id);
        })->get();
        $coupons = [];
        foreach($getCoupons as $key => $coupon){
            if($coupon->owner_type == 1 && $coupon->merchant_id == $product->merchant->id && $coupon->start_date <= $fromDate->format('Y-m-d H:i:s') && $coupon->end_date >= $fromDate->format('Y-m-d H:i:s')){
                $coupons[$key] = $coupon;
            }elseif($coupon->owner_type == 0){
                $coupons[$key] = $coupon;
            }
        }
        
    }else{
        $coupons = Coupon::where('owner_type',1)->whereIsPublished(true)->where('merchant_id', $product->merchant->id)
            ->whereDate('start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
            ->whereDate('end_date', '>=', $fromDate->format('Y-m-d H:i:s'))->whereHas('couponCategories',function($q) use($category_id){
                return $q->where('category_id',$category_id);
            })->get();
    }
    $cu = [];
    $id = [];
    foreach($coupons as $key => $cou){
        if(count($cou->couponSubCategories) > 0){
            $cu[$key] = $cou->whereHas('couponSubCategories',function($q) use($sub_category_id,$category_id,$cou){
                return $q->where('category_id', $category_id)->where('sub_category_id',$sub_category_id)->where('coupon_id',$cou->id);
            })->pluck('id');
        }else{
            $id[$key] = $cou->id;
        }

        if(count($cou->couponExSubCategory) > 0){
            $cu[$key] = $cou->whereHas('couponExSubCategory',function($q) use($sub_category_id,$category_id,$cou){
                return $q->where('category_id', $category_id)->where('coupon_id',$cou->id)->where('ex_sub_category_id','!=',$sub_category_id);
            })->pluck('id');
        }else{
            $id[$key] = $cou->id;
        }

        if(count($cou->couponProducts) > 0){
            $cu[$key] = $cou->whereHas('couponProducts',function($q) use($sub_category_id,$category_id,$cou,$product){
                return $q->where('category_id', $category_id)
                ->where('coupon_id',$cou->id)
                ->where('category_id',$category_id)
                ->where('sub_category_id',$sub_category_id)
                ->where('merchant_id',$product->merchant->id);
            })->pluck('id');
        }else{
            $id[$key] = $cou->id;
        }
    }
    $totalIds = array_merge(Arr::flatten($cu),$id);
    return Coupon::whereIn('id',$totalIds)->get();

}

function array_flatten($array)
{
    if (!is_array($array)) {
        return false;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        } else {
            $result[$key] = $value;
        }
    }
    return $result;
}

function checkUsedExpiredCoupon($item)
{
    $data = App\Models\Coupon::find($item->coupon_id);
    $getCoupon = App\Models\Coupon::where('id', $item->coupon_id);
    $toDate = Carbon::parse($item->updated_at);
    $fromDate = Carbon::now();
    $totalDays =  $toDate->diffInDays($fromDate);
    if($data->usage_time != null) {
        if($data->pick_up_limit != null) {
            $getCoupon = $getCoupon->where('pick_up_limit', '>', $item->limit_pickup_day ?? 0);
        } else {
            $getCoupon = $getCoupon->where('usage_time', '>', $totalDays ?? 0);
        }
    }
    if($data->usage_limit_per_coupon != null) {
        if($data->usage_limit_per_member != null) {
            $getCoupon = $getCoupon->where('usage_limit_per_member', '>', $item->limit_per_member ?? 0);
        } else {
            $getCoupon = $getCoupon->where('usage_limit_per_coupon', '>', $data->total_used_member ?? 0);
        }
    }
    $getCoupon = $getCoupon->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                            ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                            ->whereIsPublished(true)
                            ->first();
    if($getCoupon != null) {
        return false;
    }
    return true;
}

function checkCouponStartAndEndDateExpired($coupondetails){
    if($coupondetails->start_date<= date("Y-m-d H:i:s") && $coupondetails->end_date>= date("Y-m-d H:i:s")){
        return false;
    }else{
        return true;
    }
}

function createFmailyMemberMyself($customer) {
    FamilyMember::create([
        'first_name'=> $customer->first_name,
        'last_name'=> $customer->last_name,
        'customer_id'=> $customer->id,
        'relationship_type_id' => 1,
        'email'=> $customer->email,
        'phone'=> $customer->phone,
        'dob'=> $customer->dob,
        'gender'=> $customer->gender,
    ]);
}

function getLowestPrice($product)
{
    $products = $product->productsVariations->whereNull('discount_price')->whereNull('promotion_price');
    $vproduct = 0;
    if($products->count() == $product->productsVariations->count()){
        $vproduct = $product->productsVariations->whereNotNull('original_price')->sortBy('original_price')->first();
    }else{
        $discount = $product->productsVariations->whereNotNull('discount_price')->sortBy('discount_price')->first();
        $promotion = $product->productsVariations->whereNotNull('promotion_price')->sortBy('promotion_price')->first();
        if($discount != null && $promotion != null ){
            if($discount->discount_price > $promotion->promotion_price){
                $vproduct = $promotion;
            }
            if($promotion->promotion_price > $discount->discount_price){
                $vproduct = $discount;
            }
        }
        if(isset($discount)){
            $vproduct = $discount;
        }
        if(isset($promotion)){
            $vproduct = $discount;
        }
    }
    // dd($vproduct);
    return $vproduct;
}


if (!function_exists('highlightKeywords')) {
    function highlightKeywords($text, $keyword)
    {
        $keywords = explode(' ', $keyword);
        foreach ($keywords as $keyword) {
            $text = preg_replace("/($keyword)/i", '<span class="text-orangeMediq">$1</span>', $text);
        }
        return $text;
    }
}

