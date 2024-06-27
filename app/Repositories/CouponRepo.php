<?php


namespace App\Repositories;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Recipient;
use App\Models\SubCategory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\CouponProduct;
use App\Models\CouponCategory;
use App\Models\CouponAttribute;
use App\Models\CouponExProduct;
use App\Models\CouponSubCategory;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\DB;
use App\Models\CouponExSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class CouponRepo
{
    public function getCoupons($request)
    {
        $coupon     = $this->couponData($request);
        $datatables       = DataTables::of($coupon)
            ->addIndexColumn()
            ->addColumn('no', function ($coupon) {
                return '';
            })
            ->editColumn('coupon_code', function ($coupon) {
                $coupon_code  = $coupon->coupon_code;
                return $coupon_code;
            })
            ->editColumn('coupon_name', function ($coupon) {
                $coupon_name  = $coupon->name_en;
                return $coupon_name;
            })
            ->editColumn('amount', function ($coupon) {
                $amount  = $coupon->coupon_amount;
                return $amount;
            })->editColumn('coupon_category_name', function ($coupon) {
                $coupon_category = CouponCategory::join("categories","categories.id","=","coupon_categories.category_id")
                                                ->where('coupon_categories.coupon_id', $coupon->id)
                                                ->pluck("categories.name_en")
                                                ->toArray();
                return  $coupon_category ? implode(", ", $coupon_category) : '';

            })->editColumn('merchant_name', function ($coupon) {
                $merchant = User::where('id', $coupon->merchant_id)->first();
                return isset($merchant) ? $merchant->name_en : '';
            
            })->editColumn('start_date', function ($coupon) {
                return $coupon->start_date ?? '';

            })->editColumn('end_date', function ($coupon) {
                return $coupon->end_date;

            })->editColumn('usage_per_coupon', function ($coupon) {
                $usagePerCoupon =  isset($coupon->total_used_member) ? $coupon->total_used_member .'/'.$coupon->usage_limit_per_coupon : 0 . ' / ' . $coupon->usage_limit_per_coupon;
                return $coupon->usage_limit_per_coupon ? $usagePerCoupon : '-';
            // })->editColumn('usage_per_member', function ($coupon) {
            //     $usagePerMember = $coupon->collects->map(function($item,$key){
            //         return isset($item->limit_per_member) ? $item->limit_per_member : 0;
            //     });
            //     return  isset($coupon->usage_limit_per_member) ? $coupon->usage_limit_per_member.'/'.$usagePerMember->sum() : '-';
            })->editColumn('updated_at', function ($coupon) {
                $latest_update   =  '';
                $latest_update  .= $coupon->updated_at;
                $latest_update  .= "<br>";
                $latest_update  .= "<span class='fw-boldest'>";
                $latest_update  .= $coupon->updated_by ? $coupon->updated_by : '';
                $latest_update  .= "</span>";
                return $latest_update;
            })

            ->editColumn('status', function ($coupon) {

                $btn       = '';

                $btn      .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route     = "'" . route('couponChangeStatus') . "'";
                if ($coupon->is_published) {
                    $btn  .= '<input data-id="' . $coupon->id . '" onclick="statusChange(' . $coupon->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0" checked >';
                    $btn  .= '</div>';
                } else {
                    $btn  .= '<input data-id="' . $coupon->id . '" onclick="statusChange(' . $coupon->id . ',' . $route . ')"
                                            class="categories-toggle-class form-check-input" type="checkbox"
                                            date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                            data-on="1" data-off="0"  >';
                    $btn  .= '</div>';
                }

                return $btn;
            })

            ->addColumn('action', function ($coupon) {
                $type = null;
                if($coupon->coupon_type !== null){
                    if($coupon->coupon_type == 0){
                        $type = 'birthday';
                    }else{
                        $type = 'welcome';
                    }
                }
                $btn  = '';
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                if($checkAdminRole == true){
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                    <a href="' . url('admin/coupon/'.$coupon->id.'/edit?coupon_type='.$type).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                    <form action="' . route('coupon.destroy', $coupon->id) . '" method="POST" class="action-form" style="display:inline">
                    ' . csrf_field() . '' . method_field("DELETE") . '
                        <a href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm confirm_delete" data-kt-docs-table-filter="delete_row">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </a>
                    </form>
                </div>';
                }
                else{
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                    <a href="' . url('admin/coupon/'.$coupon->id.'/edit?coupon_type='.$type).'" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>
                </div>';
                }
      

                return "<div class='action-column'>" . $btn . "</div>";
            })
            ->rawColumns([
                'coupon_code', 
                'coupon_name',
                'amount', 
                'coupon_category_name', 
                'merchant_name', 
                'start_date', 
                'end_date', 
                'status', 
                'updated_at', 
                'action',
                // 'usage_per_member',
                'usage_per_coupon',
            ]);

        return $datatables->make(true);
    }

    public function couponData($request)
    {
        $search   = $request->search;
        $status   = $request->status;
        $merchant_id = $request->merchant_id;
        $coupon_category_id = $request->coupon_category_id;

        $data = Coupon::whereNull('deleted_at');
        if($request->coupon_type != null){
            if($request->coupon_type == 'birthday'){
                $type = 0;
            }else{
                $type = 1;
            }
            $data = $data->where('coupon_type',$type);
        }else{
            $data = $data->whereNull('coupon_type');
        }

        if (isset($coupon_category_id) && $coupon_category_id != 'all') {
            $data = $data->join("coupon_categories","coupon_categories.coupon_id","=","coupons.id")
                         ->where("coupon_categories.category_id",$coupon_category_id);
            // $data = $data->where('coupon_category_id', $coupon_category_id)->whereNull('deleted_at');
        }

        if (isset($merchant_id) && $merchant_id != 'all') {
            $data = $data->where('merchant_id', $merchant_id);
        }

        if ($search) {
            $data = $data->Where('name_en', 'LIKE', "%$search%")->orWhere('discount_type', 'LIKE', "%$search%")->whereNull('deleted_at');
        }

        if (isset($status) && $status != 'all' && isset($search)) {
            $data = $data->where('is_published', $status)->Where('name_en', 'LIKE', "%$search%")->orWhere('discount_type', 'LIKE', "%$search%")->whereNull('deleted_at');
        }
        return $data->orderBy('coupons.id', 'desc')->select("coupons.*")->get();
    }

    public function getCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);

        return $coupon;
    }

    public function saveCoupon(Request $request, $id = null)
    {
        $input = $request->all();
        if(isset($input['icon'])){
            if (!existImagePath($input['icon'])) {
                $input['icon'] = null;
            } else {
                $input['icon'] = getImage($request->icon);
            }
        }
        
        $is_merchant = [];
        $merchants = Coupon::where('merchant_id', $request->merchant_id)->whereIsPublished(true);
        if ($id === NULL) {
            $coupon = new Coupon();
            $merchant = $merchants->first();
            if ($merchant != null) {

                $merchants->update([
                    'is_bundle' => 1
                ]);
                $input['is_bundle'] = 1;
            }
        } else {
            $coupon  = Coupon::findOrFail($id);
            if ($request->merchant_id != null) {
                // check old merchant_id same as current id
                if ($request->merchant_id != $coupon->merchant_id) {
                    $count_merchant = Coupon::where('merchant_id', $coupon->merchant_id)->count();
                    if ($count_merchant <= 2) {
                        Coupon::where('merchant_id', $coupon->merchant_id)->update([
                            'is_bundle' => 0
                        ]);
                    }

              
                    $is_merchant = $merchants->get();
                    if ($is_merchant->count() >= 1) {
                        $merchants->update([
                            'is_bundle' => 1
                        ]);
                        Coupon::where('id', $id)->update(['is_bundle' => 1]);
                    }
                }
            }
        }

        $saved    = $coupon->fill($input)->save();
        $couponId = $coupon->id;

        $category = isset($input['product_categories']) ? $input['product_categories'] : null;
        $subCategory = isset($input['product_sub_categories']) ? $input['product_sub_categories'] : null;
        $exSubCategory = isset($input['exclude_sub_categories']) ? $input['exclude_sub_categories'] : null;
        $merchant = isset($input['merchant_id']) ? $input['merchant_id'] : null;
        $product_id = isset($input['product_ids']) ? $input['product_ids'] : null;
        $exProduct_id = isset($input['exclude_products']) ? $input['exclude_products'] : null;

        $products = Product::where('is_published', true);
        if ($category != null) {
            $this->removeCouponCategories($couponId);
            foreach ($category as $category_id) {

                $this->addCouponCategory($couponId, $category_id);
                
            }
        }
        
        if($subCategory != null){

            foreach ($subCategory as $subcate_id) {

                $subcate = SubCategory::where('id',$subcate_id)->first();

                $this->addCouponSubCategory($couponId, $subcate->category_id, $subcate->id);

            }

        }

        if($exSubCategory != null){

            foreach ($exSubCategory as $ex_subcate_id) {

                $ex_sub_cate = SubCategory::where('id',$ex_subcate_id)->first();

                $this->addCouponExSubCategory($couponId, $ex_sub_cate->category_id, $ex_sub_cate->id);
            }

        }

        if($product_id != null){
                
            foreach($product_id as $product){

                $product = Product::where('id',$product)->first();

                $this->addCouponProduct($couponId, $product->merchant_id, $product->category_id, $product->sub_category_id, $product->id);
            }
        }

        if($exProduct_id != null){
                
            foreach($exProduct_id as $product){

                $product = Product::where('id',$product)->first();

                $this->addCouponExProduct($couponId, $product->merchant_id, $product->category_id, $product->sub_category_id, $product->id);
            }
        }
    }

    public function removeCouponCategories($couponId)
    {
        CouponCategory::where('coupon_id', $couponId)->delete();
        CouponSubCategory::where('coupon_id', $couponId)->delete();
        CouponExSubCategory::where('coupon_id', $couponId)->delete();
        CouponProduct::where('coupon_id', $couponId)->delete();
        CouponExProduct::where('coupon_id', $couponId)->delete();
    }

    public function addCouponCategory($coupon_id, $category_id)
    {
        $coupon_category = new CouponCategory();
        $coupon_category->coupon_id = $coupon_id;
        $coupon_category->category_id = $category_id;
        return ($coupon_category->save()) ? $coupon_category : false;
    }

    public function addCouponSubCategory($coupon_id, $category_id, $sub_category_id)
    {
        $coupon_sub_cate = new CouponSubCategory();
        $coupon_sub_cate->coupon_id = $coupon_id;
        $coupon_sub_cate->category_id = $category_id;
        $coupon_sub_cate->sub_category_id = $sub_category_id;
        return ($coupon_sub_cate->save()) ? $coupon_sub_cate : false;
    }

    public function addCouponExSubCategory($coupon_id, $category_id, $ex_sub_category_id)
    {
        $coupon_ex_sub_cate = new CouponExSubCategory();
        $coupon_ex_sub_cate->coupon_id = $coupon_id;
        $coupon_ex_sub_cate->category_id = $category_id;
        $coupon_ex_sub_cate->ex_sub_category_id = $ex_sub_category_id;
        return ($coupon_ex_sub_cate->save()) ? $coupon_ex_sub_cate : false;
    }

    public function addCouponProduct($coupon_id,$merchant_id, $category_id, $sub_category_id,$product_id)
    {
        $coupon_product = new CouponProduct();
        $coupon_product->coupon_id = $coupon_id;
        $coupon_product->category_id = $category_id;
        $coupon_product->sub_category_id = $sub_category_id;
        $coupon_product->merchant_id = $merchant_id;
        $coupon_product->product_id = $product_id;
        return ($coupon_product->save()) ? $coupon_product : false;
    }

    public function addCouponExProduct($coupon_id,$merchant_id, $category_id, $sub_category_id,$product_id)
    {
        $coupon_product = new CouponExProduct();
        $coupon_product->coupon_id = $coupon_id;
        $coupon_product->category_id = $category_id;
        $coupon_product->sub_category_id = $sub_category_id;
        $coupon_product->merchant_id = $merchant_id;
        $coupon_product->product_id = $product_id;
        return ($coupon_product->save()) ? $coupon_product : false;
    }



    public function deleteCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return ($coupon) ? $coupon : false;
    }


    public function changeStatus($request)
    {
        $coupon    = Coupon::findOrFail($request->id);
        $coupon->update(['is_published' => !$coupon->is_published]);

        return $coupon;
    }

    public function saveCollectCouponInfo($customer_id,$coupon_id) {
        $collectCoupon = new CouponCollect;
        $collectCoupon->customer_id = $customer_id;
        $collectCoupon->coupon_id = $coupon_id;
        $collectCoupon->save();
        return $collectCoupon;
    }

    public function checkAvailableCoupon($customer_id,$collected_coupons,$recipients,$isTwoRecipients)
    {
        $date = Carbon::now();
        $totalAmount = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices');
        // $avaCollectedIds = $collected_coupons->whereDate('coupons.start_date', '<=', $date->format('Y-m-d'))
        // ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d'))->pluck('id');
        $avaCollectedIds = $collected_coupons->pluck('id');
        $all_recipients = $recipients->merge($isTwoRecipients);
        $getProduct = $all_recipients->first();
        $totalSameProducts =  $all_recipients->where('product_id',$getProduct->product_id ?? 0)->count();
        // dd( count($all_recipients), $totalSameProducts);
        $couponId = [];
        if(count($all_recipients)>0){
            foreach($all_recipients as $rkey => $recipient){
                $couponId[$rkey]= getTotalCoupon($recipient->product_id,$recipient->product->category_id,$recipient->product->sub_category_id, 'checkout')->whereIn('id',$avaCollectedIds)->flatten(1)->unique('id');
            }
        }
        $availableCoupons =  Arr::flatten($couponId);
        $getCoupons= [];
        foreach(collect($availableCoupons)->unique('id') as $key => $coupon){

            $getCoupon = Coupon::with('merchant')->where('id',$coupon->id)->whereIsPublished(true);

            $isCollected = CouponCollect::where('customer_id',$customer_id)->where('coupon_id',$coupon->id)->first();

            $toDate = Carbon::parse($isCollected->created_at);
            $fromDate = Carbon::now();
            $totalDays =  $toDate->diffInDays($fromDate); 
            if($coupon->usage_time != null){
                // if($coupon->pick_up_limit != null){
                //     $getCoupon = $getCoupon->where('pick_up_limit','>',$isCollected->limit_pickup_day ?? 0);
                // }else{
                //     $getCoupon = $getCoupon->where('usage_time','>',$totalDays ?? 0);
                // }
                $getCoupon = $getCoupon->where('usage_time','>',$totalDays ?? 0);
            }
            
            if($coupon->usage_limit_per_coupon !== null){
                if($coupon->usage_limit_per_member !== null){
                    $getCoupon = $getCoupon->where('usage_limit_per_member','>',$isCollected->limit_per_member ?? 0);
                }else{
                    $getCoupon = $getCoupon->where('usage_limit_per_coupon','>',$coupon->total_used_member ?? 0);
                }
            }

            if($coupon->coupon_type !== null){
                $exist_bcoupon = null;
                $exist_wcoupon = null;
                if($coupon->coupon_type == 0){
                    // $order = Order::where('customer_id',$customer_id)->exists();
                    // if(!$order){
                        $exist_bcoupon = $coupon->where('coupon_type',0)->whereHas('collects',function($q) use($customer_id){
                            $q->where('customer_id',$customer_id)->where('is_available',0);
                        })->first();
                    // }
                    if($exist_bcoupon === null){
                        $d = new DateTime(Auth::guard('customer')->user()->dob);
                        $timestamp = $d->getTimestamp(); // Unix timestamp
                        $formatted_date = $d->format('m'); // 2003-10-16
                        if($formatted_date ===  $date->format('m')){
                            $getCoupon = $getCoupon;
                        }else{
                            $getCoupon = $getCoupon->where('id',null);
                        }
                    }
                    // elseif($exist_bcoupon == null){
                    //     $getCoupon = $getCoupon->where('id',null);
                    // }
                }
                if($coupon->coupon_type === 1){
                    $order = Order::where('customer_id',$customer_id)->exists();
                    if(!$order){
                        $exist_wcoupon = $coupon->where('coupon_type',1)->whereHas('collects',function($q) use($customer_id){
                            $q->where('customer_id',$customer_id)->where('is_available',0);
                        })->first();
                        if($exist_wcoupon === null){
                            if($totalDays <= 30){
                                $getCoupon = $getCoupon;
                            }else{
                                $getCoupon = $getCoupon->where('id',null);
                            }
                        }elseif($exist_wcoupon == null){
                            $getCoupon = $getCoupon->where('id',null);
                        }
                    }
                    // else{
                    //     $getCoupon = $getCoupon->where('id',null);
                    // }
                }
            }

            if($coupon->product_limit_type == 'same'){

                if($totalSameProducts == count($all_recipients)){
                    // if($totalSameProducts == count($all_recipients)){
                        $getCoupon = $getCoupon->where('product_limit_type','same');
                    // }

                }
                // elseif($totalSameProducts != count($all_recipients)){
                //     // if($totalSameProducts != count($all_recipients)){
                //         $getCoupon = $getCoupon->where('product_limit_type','multi_product');
                //     // }
                // }
                else{
                    $getCoupon = $getCoupon->where('id',null);
                }
            }


            if($coupon->minimum_spend != null && $coupon->minimum_spend <= $totalAmount){
                $getCoupon = $getCoupon;
            }

            if($coupon->coupon_type === null){
                $coupon = Coupon::whereDate('start_date', '<=', $date->format('Y-m-d'))
                ->whereDate('end_date', '>=', $date->format('Y-m-d'))->find($coupon->id);
            }
            if($coupon === null){
                $getCoupon = $getCoupon->where('id',null);
            }
            
            $getCoupons[$key] = $getCoupon->first();
            
        }   
        if(count(array_filter($getCoupons)) > 0){
            $notAvailableCoupons = $collected_coupons->with('merchant')->whereNotIn('coupons.id',collect(array_filter($getCoupons))->pluck('id')->toArray())->get()->unique();
        }else{
            $notAvailableCoupons = $collected_coupons->with('merchant')->get()->unique();
        }
        // dd(array_values(array_filter($getCoupons)));
        $data =[
            'availableCoupons' => array_values(array_filter($getCoupons)),
            'notAvailableCoupons' => $notAvailableCoupons,
        ];
        return $data;
    }

}
