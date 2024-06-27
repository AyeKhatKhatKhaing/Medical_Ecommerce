<?php

namespace App\Repositories;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Record;
use App\Models\Product;
use App\Models\Customer;
use App\Mail\GeneralMail;
use App\Models\OrderItems;
use App\Models\CouponBanner;
use App\Models\FamilyMember;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\NotificationType;
use App\Models\ProductFavourite;
use Yajra\DataTables\DataTables;
use App\Models\VaccinationRecord;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerNotification;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserFormRequest;
use App\Models\BillingInfo;
use Illuminate\Support\Facades\Validator;

class CustomerRepo
{

    public function getCustomer($request)
    {
        $customers  = Customer::whereNotNull('email');
        $search = $request->search;
        if (!empty($search)) {
            $customers = $customers->where(function ($query) use($search){
            return $query->where('first_name', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%");
            });
        }
        $customers = $customers->get();
        $datatables       = DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('no', function ($customers) {
                return '';
            })

            ->editColumn('name', function ($customers) {
                $title = "";
                if($customers->title_full_name == 'Mrs'){
                    $title = "Miss/Mrs.";
                }
                elseif($customers->title_full_name == 'Mr'){
                    $title = "Mr.";
                }
                return $title. ' '.$customers->last_name . ' ' . $customers->first_name;
            })

            ->editColumn('enabled', function ($customers) {
                $status = '';

                if ($customers->email_is_verified) {
                    $status .= '<span class="badge bg-primary" style="padding:5px 8px;">Activated</span>';
                } else {

                    $status .= '<span class="badge bg-danger" style="padding:5px 8px;">Inactive</span>';
                }

                return $status;
            })
            ->editColumn('registered_at', function ($customers) {

                return date('Y-m-d H:i:s', strtotime($customers->created_at));
            })

            ->editColumn('phone', function ($customers) {
                if ($customers->phone !== null) {
                    $ph = $customers->phone;
                    $phoneNo = substr($ph, -8);
                    $code = substr($ph, 0, -8);
                 }
                $btn      = '';
                if($customers->phone){
                    $btn .=  $code . ' ' . substr($phoneNo,0,4) . ' ' . substr($phoneNo, 4,4);  
                }
                if ($customers->phone && $customers->is_verified == 1) {
                    $btn .= '
                    <span
                                                    class="svg-icon svg-icon-2 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20"
                                                            rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>';
                } 
                return $btn;
            })

            ->editColumn('email', function ($customers) {

                $btn      = '';

                $btn .= $customers->email;
              
                if ($customers->email && $customers->email_is_verified == 1) {
                    $btn .= '
                    <span
                                                    class="svg-icon svg-icon-2 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20"
                                                            rx="10"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>';
                } 
                return $btn;
            })

            ->editColumn('email_is_verified', function ($customers) {

                $btn      = '';
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }

                $btn     .= '<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">';
                $route    = "'" . route('customerChangeStatus') . "'";
                if($checkAdminRole == true){
                    if ($customers->email_is_verified) {
                        $btn .= '<input data-id="' . $customers->id . '" onclick="statusChange(' . $customers->id . ',' . $route . ')"
                                                    class="categories-toggle-class form-check-input" type="checkbox"
                                                    date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                    data-on="1" data-off="0" checked>';
                        $btn .= '</div>';
                    } else {
                        $btn .= '<input data-id="' . $customers->id . '" onclick="statusChange(' . $customers->id . ',' . $route . ')"
                                                    class="categories-toggle-class form-check-input" type="checkbox"
                                                    date-onstyle="success" date-offstyle="primary" data-toggle="toggle"
                                                    data-on="1" data-off="0"  >';
                        $btn .= '</div>';
                    }
                }
                else{
                    if ($customers->email_is_verified) {
                        $btn .= '<span class="badge bg-primary" style="padding:5px 8px;">Activated</span>';
                    } else {
    
                        $btn .= '<span class="badge bg-danger" style="padding:5px 8px;">Inactive</span>';
                    }
                }
               

                return $btn;
            })



            ->addColumn('action', function ($customers) {
                $checkAdminRole = false;
                foreach(auth()->user()->roles as $data) {
                    if($data->name=='admin' ){
                        $checkAdminRole = true;
                        break;
                    }
                }
                $btn  = '';
                if($checkAdminRole) {
                    $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('customer.show', $customers->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            <form action="' . route('customer.destroy', $customers->id) . '" method="POST" class="action-form" style="display:inline">
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
                            <a href="' . route('customer.show', $customers->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                            </div>';
                }
                return "<div class='d-flex justify-content-center flex-shrink-0'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'enabled','email_is_verified','registered_at', 'updated_at', 'email','phone','action']);

        return $datatables->make(true);
    }

    public function customerData($request)
    {
        $customerData  = Customer::whereNotNull('email');
        $search = $request->search;
        if (!empty($search)) {
            $customerData = $customerData->where('first_name', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%");
        }
        $getData = $customerData->get();
        // dd($getData);
        return $getData;
    }


    public function getSubscriberList($request)
    {
        $customers        = $this->subscriberData($request);

        $datatables       = DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('no', function ($customers) {
                return '';
            })

            ->editColumn('name', function ($customers) {
                return $customers->first_name . ' ' . $customers->last_name;
            })

            ->addColumn('action', function ($customers) {
                $btn  = '';
                $btn .= '<a href="' . route('customer.show', $customers->id) . '" title="view Blog">
                            <button class="btn btn-icon btn btn-secondary w-30px h-30px">
                                <i class="bi bi-eye" aria-hidden="true"></i>
                            </button>
                        </a>';
                return "<div class='d-flex justify-content-center flex-shrink-0'>" . $btn . "</div>";
            })
            ->rawColumns(['name', 'email_is_verified', 'updated_at', 'action']);

        return $datatables->make(true);
    }


    public function subscriberData($request)
    {
        $data  = DB::table('customer_notification')->leftJoin('customers', 'customer_notification.customer_id', '=', 'customers.id')
        ->select('customers.*','customer_notification.created_at as date')
        ->where('customer_notification.custom_notification_id', 1)
        ->where('customer_notification.notification_type_id', 2);
        $search = $request->search;
        if ($search) {
            $data->where('customers.first_name', 'LIKE', "%$search%");
            $data->orWhere('customers.last_name', 'LIKE', "%$search%");
            $data->orWhere('customers.email', 'LIKE', "%$search%");
        }
        // dd($data->get());
        return $data->get();
    }



    public function getBlogSubscriberList($request)
    {
        $customers        = $this->blogSubscriberData($request);

        $datatables       = DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('no', function ($customers) {
                return '';
            })
            ->rawColumns(['no']);

        return $datatables->make(true);
    }


    public function blogSubscriberData($request)
    {
        $data  = DB::table('blog_subsribers')
        ->select('blog_subsribers.*','blog_subsribers.created_at as date');
        $search = $request->search;
        if ($search) {
            $data->orWhere('customers.email', 'LIKE', "%$search%");
        }
        // dd($data->get());
        return $data->get();
    }




    public function getCustomersData($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

    public function getFamilyMemberData($id)
    {
        $family_member = FamilyMember::where('customer_id',$id)->where('relationship_type_id','!=',1)->get();
        return $family_member;
    }

    public function changeStatus($request)
    {
        $customer = Customer::findOrFail($request->id);
        $customerNotificationLang = CustomerNotification::where("customer_id",$customer->id)->where("custom_notification_id",4)->first();
        $defaultLang = "zh-hk";
        if($customerNotificationLang) {
            $defaultLang = NotificationType::where("id",$customerNotificationLang->notification_type_id)->first()->name_en;
        }
        $customer->update(['email_is_verified' => !$customer->email_is_verified]);
        $coupons = Coupon::whereIsPublished(true)->where('coupon_type',1)->get();
        if(count($coupons) > 0){
            foreach($coupons as $coupon){
                CouponCollect::create([
                    'customer_id' => $customer->id,
                    'coupon_id' => $coupon->id,
                ]);
            }
        }
        $couponBanner = CouponBanner::first();
        if($customer->email_is_verified == true){
            createFmailyMemberMyself($customer);
            $data = [
                'email' => $customer->email,
                'name' => $customer->first_name,
                'created_at' => $customer->created_at,
                'coupons' => $coupons,
                'welcome_reg' => 'welcome_reg',
                'welcome_img' => $couponBanner->welcome_img,
            ];
            Mail::to($data['email'])->locale($defaultLang)->send(new GeneralMail($data));
        }
        return $customer;
    }

    public function pendingBookingList($id){
        $pendingList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at")
        ->leftJoin("orders","orders.id","order_items.orders_id")
        ->leftJoin("products","products.id","order_items.product_id")
        ->whereIn("order_status",[1,2,3,5])
        ->where("orders.customer_id",$id)
        ->groupBy("order_items.orders_id")
        ->orderBy("orders.created_at","DESC")
        ->get();
        return $pendingList;
    }


    public function completeBookingList($id){
        $completedList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at",
        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time")
        ->leftJoin("orders","orders.id","order_items.orders_id")
        ->leftJoin("products","products.id","order_items.product_id")
        ->leftJoin("recipients","recipients.id","order_items.recipient_id")
        ->whereIn("order_status",[4])
        ->where("orders.customer_id",$id)
        ->groupBy("order_items.orders_id")
        ->orderBy("orders.created_at","DESC")
        ->get();
        return $completedList;
    }

    public function cancelledBookingList($id){
        $cancelledList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at",
        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time")
        ->leftJoin("orders","orders.id","order_items.orders_id")
        ->leftJoin("products","products.id","order_items.product_id")
        ->leftJoin("recipients","recipients.id","order_items.recipient_id")
        ->whereIn("order_status",[5,6,7])
        ->where("orders.customer_id",$id)
        ->groupBy("order_items.orders_id")
        ->orderBy("orders.created_at","DESC")
        ->get();
        return $cancelledList;
    }

    public function wishlist($id){
        $productFavourite = ProductFavourite::where("customer_id", $id)->pluck("product_id")->toArray();
        $productList = Product::whereIn("id", $productFavourite)->get();
        return $productList;
    }

    public function healthRecord($id){
        $healthRecordInfo = HealthRecord::select(
            "health_record.*",
            "blood_type.name_en as blood_type_name",
            "maritial_status.name_en as maritial_status_name"
            )
            ->leftjoin("family_members","family_members.id","health_record.family_member_id")
            ->leftjoin("blood_type","blood_type.id","health_record.blood_type_id")
            ->leftjoin("maritial_status","maritial_status.id","health_record.maritial_status_id")
            ->where('family_members.customer_id',$id)
            ->first();
        if($healthRecordInfo) {
        $healthRecordInfo->personal_medicial_history_list = unserialize($healthRecordInfo->personal_medicial_history_list);
        $healthRecordInfo->family_medicial_history_list = unserialize($healthRecordInfo->family_medicial_history_list);
        $healthRecordInfo->allergic_history_list = unserialize($healthRecordInfo->allergic_history_list);
        }

        return $healthRecordInfo;
    }
    public function vaccinationRecord($id){
        $vaccineInfo = VaccinationRecord::select(
            "vaccination_record.*",
            "vaccine.name_en as vaccine_name",
            "age_group.name_en as age_group_name",
            DB::raw("DATE_FORMAT(vaccination_record.vaccination_date,'%d/%m/%Y') AS vaccination_date")
            )
            ->join("family_members","family_members.id","vaccination_record.family_member_id")
            ->join("vaccine","vaccine.id","vaccination_record.vaccine_id")
            ->join("age_group","age_group.id","vaccination_record.age_group_id")
            ->where('family_members.customer_id',$id)
            ->get();
        return $vaccineInfo;
    }

    public function bodyCheckReord($id){
        $recordList = Record::select("record.*","family_members.relationship_type_id")
        ->join("family_members","family_members.id","record.family_member_id")
        ->where("family_members.customer_id",$id)
        ->where("report_type",1)
        ->get();
        return $recordList;
    }

    public function medicalCheckReord($id){
        $recordList = Record::select("record.*","family_members.relationship_type_id")
        ->join("family_members","family_members.id","record.family_member_id")
        ->where("family_members.customer_id",$id)
        ->where("report_type",2)
        ->get();
        return $recordList;
    }
    public function availableCoupon($id){
        $date = Carbon::now();

                    $avaiableCoupons = Coupon::select("coupons.*")
                    ->whereDate('coupons.start_date', '<=', $date->format('Y-m-d'))
                    ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d'))
                    ->whereIsPublished(true)
                    ->get();
            $avaiableCoupons1 = Coupon::select("coupons.*")
                    ->whereNull('coupons.start_date')
                    ->whereNull('coupons.end_date')
                    ->whereIsPublished(true)
                    ->get();
            $avaiableCoupons = $avaiableCoupons->merge($avaiableCoupons1);
            $avaiableCouponsIds = [];
            if(count($avaiableCoupons) > 0) {
            foreach($avaiableCoupons as $k => $data) {
            $isCollected = CouponCollect::where('customer_id',$id)
                            ->where('coupon_id',$data->id)
                            ->orderBy("id","DESC")
                            ->first();
            if($isCollected != null) {
            $getCoupon = Coupon::where('id', $data->id);
            if($data->coupon_type == 0 || $data->coupon_type == 1) {
            if($isCollected->is_available==1) {
            $avaiableCouponsIds[$k] = $getCoupon->first();
            }
            }else{
            $toDate = Carbon::parse($isCollected->updated_at);
            $fromDate = Carbon::now();
            $totalDays =  $toDate->diffInDays($fromDate);
            if($data->usage_time != null) {
            if($data->pick_up_limit != null) {
                $getCoupon = $getCoupon->where('pick_up_limit', '>', $isCollected->limit_pickup_day ?? 0);
            } else {
                $getCoupon = $getCoupon->where('usage_time', '>', $totalDays ?? 0);
            }
            }
            if($data->usage_limit_per_coupon != null) {
            if($data->usage_limit_per_member != null) {
                $getCoupon = $getCoupon->where('usage_limit_per_member', '>', $isCollected->limit_per_member ?? 0);
            } else {
                $getCoupon = $getCoupon->where('usage_limit_per_coupon', '>', $data->total_used_member ?? 0);
            }
            }
            $avaiableCouponsIds[$k] = $getCoupon->first();
            }
            }
            }
            }
            $couponList = Coupon::select(
            "coupons.id",
            "coupons.name_en",
            "coupons.icon",
            "coupons.owner_type",
            "users.icon as merchantIcon",
            )->leftjoin("users", "coupons.merchant_id", "users.id");
           
            $couponList = $couponList->join("coupon_collects","coupon_collects.coupon_id","coupons.id")
                ->where('coupon_collects.customer_id',$id);
            // $currentDate =  date("Y-m-d");
            
            $couponList = $couponList->whereIn('coupons.id',collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray());
            
            $couponList = $couponList->groupBy("coupons.id")->with('merchant')->get();
            // dd($couponList);
        return $couponList;

    }

    public function usedCoupon($id){
        $date = Carbon::now();

                    $avaiableCoupons = Coupon::select("coupons.*")
                    ->whereDate('coupons.start_date', '<=', $date->format('Y-m-d'))
                    ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d'))
                    ->whereIsPublished(true)
                    ->get();
            $avaiableCoupons1 = Coupon::select("coupons.*")
                    ->whereNull('coupons.start_date')
                    ->whereNull('coupons.end_date')
                    ->whereIsPublished(true)
                    ->get();
            $avaiableCoupons = $avaiableCoupons->merge($avaiableCoupons1);
            $avaiableCouponsIds = [];
            if(count($avaiableCoupons) > 0) {
            foreach($avaiableCoupons as $k => $data) {
            $isCollected = CouponCollect::where('customer_id',$id)
                            ->where('coupon_id',$data->id)
                            ->orderBy("id","DESC")
                            ->first();
            if($isCollected != null) {
            $getCoupon = Coupon::where('id', $data->id);
            if($data->coupon_type == 0 || $data->coupon_type == 1) {
            if($isCollected->is_available==1) {
            $avaiableCouponsIds[$k] = $getCoupon->first();
            }
            }else{
            $toDate = Carbon::parse($isCollected->updated_at);
            $fromDate = Carbon::now();
            $totalDays =  $toDate->diffInDays($fromDate);
            if($data->usage_time != null) {
            if($data->pick_up_limit != null) {
                $getCoupon = $getCoupon->where('pick_up_limit', '>', $isCollected->limit_pickup_day ?? 0);
            } else {
                $getCoupon = $getCoupon->where('usage_time', '>', $totalDays ?? 0);
            }
            }
            if($data->usage_limit_per_coupon != null) {
            if($data->usage_limit_per_member != null) {
                $getCoupon = $getCoupon->where('usage_limit_per_member', '>', $isCollected->limit_per_member ?? 0);
            } else {
                $getCoupon = $getCoupon->where('usage_limit_per_coupon', '>', $data->total_used_member ?? 0);
            }
            }
            $avaiableCouponsIds[$k] = $getCoupon->first();
            }
            }
            }
            }
            $couponList = Coupon::select(
                "coupons.id",
                "coupons.name_en",
                "coupons.icon",
                "coupons.owner_type",
                "users.icon as merchantIcon",
                )->leftjoin("users", "coupons.merchant_id", "users.id");
           
            $couponList = $couponList->join("coupon_collects","coupon_collects.coupon_id","coupons.id")
                ->where('coupon_collects.customer_id',$id);
            // $currentDate =  date("Y-m-d");
            
            $couponList = $couponList->whereNotIn('coupon_collects.coupon_id',collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray());
           
            
            $couponList = $couponList->groupBy("coupons.id")->get();
        return $couponList;

    }

    public function changeCustomerInfo($request){
        $formattedDate = Carbon::parse($request->dob)->format('d/m/Y');

        if($request->code && $request->phone){
            $phoneNo = $request->phone;
        }
        else{
            $phoneNo = "";
        }
        
        // // $request->validate([
        // //     // 'phoneNo' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i","unique:customers,phone,"]
        // //     'phoneNo' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i","unique:customers,phone,".$request->id]
        // // ]);
        // $validator = Validator::make($request->all(), [
        //     'phoneNo' => ["nullable", "regex:/^(\+?\d{2,3})(\d{8})$/i", "unique:customers,phone," . $request->id]
        // ]);
        
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }
        $personalInfo = Customer::find($request->id);
        $personalInfo->title_full_name = $request->title_full_name;
        $personalInfo->first_name = $request->first_name;
        $personalInfo->last_name = $request->last_name;
        $personalInfo->address = $request->address;
        $personalInfo->dob = $formattedDate;
        $personalInfo->country = $request->country;
        $personalInfo->district_id = $request->district_id;
        $personalInfo->area_id = $request->area_id;
        if($personalInfo->email != $request->email){
            $personalInfo->admin_verified_email = 1;
            $personalInfo->email = $request->email;
        }
        if($personalInfo->phone != $phoneNo){
            $personalInfo->is_verified = 0;
            $personalInfo->admin_verified_phone = 1;
            $personalInfo->phone = $phoneNo;
        }
        $personalInfo->area_id = $request->area_id;
        $personalInfo->save();

        return $personalInfo;

    }

    public function subscriber($id){
        $subscriber = CustomerNotification::where("customer_id",$id)
        ->where('custom_notification_id', 1)
        ->where('notification_type_id', 2)
        ->first();
        return $subscriber;
    }

    public function deleteCustomer($id) {
        DB::statement("DELETE from billing_infos where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from card_infos where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from coupon_collects where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from customer_notification where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from family_members where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from faq_likes where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from orders where customer_id=:id",['id'=>$id]);
        // DB::statement("DELETE from products where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from product_favourite where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from recently_compared_product where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from recipients where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from stripe_customers where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from subscribers where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from blog_details_like_dislike where customer_id=:id",['id'=>$id]);
        DB::statement("DELETE from customers where id=:id",['id'=>$id]);
        return true;
    }
}
