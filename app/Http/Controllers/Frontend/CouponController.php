<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\SeoPage;
use App\Models\User as Merchant;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Coupon List
     */
    public function index(Request $request)
    {
        $selectedCategory = "all";
        $selectedSubCategory = "most-recently-added";
        $merchantList = [];
        $merchantTotalCoupon = 0;
        $category = 0;
        if($request->has("selectedCategory")) {
            $selectedCategory = $request->selectedCategory;
            if($selectedCategory !='all') {
                $category = Category::where("name_en", $selectedCategory)->first();
                if(!$category) {
                    return response()->json("not found");
                }
            }
        }
        if($request->has("selectedSubCategory")) {
            $selectedSubCategory = $request->selectedSubCategory;
        }
        $couponList = Coupon::select(
            "coupons.id",
            "coupons.name_en",
            "coupons.name_tc",
            "coupons.name_sc",
            "coupons.sub_title_en",
            "coupons.sub_title_tc",
            "coupons.sub_title_sc",
            "coupons.is_new_or_limited",
            "coupons.usage_time",
            "coupons.start_date",
            "coupons.end_date",
            "coupons.content_en",
            "coupons.content_tc",
            "coupons.content_sc",
            "coupons.merchant_id"
        )
                            ->leftjoin("coupon_categories", "coupon_categories.coupon_id", "coupons.id")
                            ->join("categories", "coupon_categories.category_id", "categories.id")
                            ->where('coupons.owner_type',1)
                            ->where('coupons.start_date', '<=', \DB::raw('NOW()'))
                            ->where('end_date', '>', \DB::raw('NOW()'))
                            ->where('coupons.is_published',true);
        if($selectedCategory != "all") {
            $couponList = $couponList->where("coupon_categories.category_id", $category->id);
        }
        if($selectedSubCategory =='expiring-first') {
            $couponList = $couponList->groupBy("coupons.id")->orderBy("coupons.end_date", "ASC")->get();
        } elseif($selectedSubCategory =='lowest-minimum-order-value') {
            $couponList = $couponList->groupBy("coupons.id")->orderBy("coupons.minimum_spend", "ASC")->get();
        } elseif($selectedSubCategory =='by-merchant') {
            $merchantList = Coupon::select(DB::raw('count(DISTINCT(coupons.id)) as total'), "coupons.merchant_id")
                                    ->join("users", "users.id", "coupons.merchant_id")
                                    ->join("coupon_categories", "coupon_categories.coupon_id", "coupons.id")
                                    ->join("categories", "coupon_categories.category_id", "categories.id")
                                    ->where('coupons.owner_type',1)
                                    ->where('coupons.start_date', '<=', \DB::raw('NOW()'))
                                    ->where('coupons.end_date', '>', \DB::raw('NOW()'))
                                    ->where('coupons.is_published',true);
            if($selectedCategory != "all") {
                $merchantList = $merchantList->where("coupon_categories.category_id", $category->id);
            }
            $merchantList = $merchantList
                                     ->groupBy("coupons.merchant_id")
                                     ->orderByRaw('count(DISTINCT(coupons.id)) DESC')
                                     ->get();
            $merchantTotalCoupon = collect($merchantList)->sum("total");
            $merchantIdList      = collect($merchantList)->pluck("merchant_id");
            $merchantIdList->prepend("id");
            $sortList = implode(",",$merchantIdList->toArray());
            \Log::Debug($sortList);
           
            $couponList  = Merchant::whereIn("users.id", $merchantIdList)
                                    ->with("coupons", function ($q) use ($selectedCategory, $category) {
                                            $q->select("coupons.*");
                                            if($selectedCategory != "all") {
                                                $q->where("coupon_categories.category_id", $category->id);
                                            }
                                            $q->join("users", "users.id", "coupons.merchant_id")
                                            ->join("coupon_categories", "coupon_categories.coupon_id", "coupons.id")
                                            ->join("categories", "coupon_categories.category_id", "categories.id")
                                            ->where('coupons.owner_type',"=",1)
                                            ->where('coupons.start_date', '<=', \DB::raw('NOW()'))
                                            ->where('coupons.end_date', '>', \DB::raw('NOW()'))
                                            ->where('coupons.is_published',true)
                                            ->groupBy("coupons.id")
                                            ->orderBy("coupons.updated_at", "DESC");
                                        }
                                    );
            if($sortList != "id"){
                $couponList  = $couponList->orderByRaw("field($sortList)");
            }
            $couponList  = $couponList->get();
        } else {
            $couponList = $couponList->groupBy("coupons.id")
                                    ->orderBy("coupons.updated_at", "DESC")
                                    ->get();
        }
        $seo= SeoPage::where("title","coupon_list")->first();
        $data = [
            'mainCategories' => Category::whereIsPublished(true)->get(),
            'selectedCategory' =>$selectedCategory,
            'merchantList' => $merchantList,
            'couponList' => $couponList,
            'selectedSubCategory'=> $selectedSubCategory,
            'merchantTotalCoupon'=> $merchantTotalCoupon,
            'main_categories' => Category::whereIsPublished(true)->get(),
            'seo'=>$seo
        ];
        if ($request->ajax()) {
            return view('frontend.coupon.data-list', $data)->render();
        } else {
            return view('frontend.coupon.list', $data);
        }

    }

    /**
     * Add coupon to collection
     */
    public function collect(Request $request)
    {

    }
}
