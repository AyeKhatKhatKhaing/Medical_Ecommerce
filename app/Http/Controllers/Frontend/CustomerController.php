<?php

namespace App\Http\Controllers\Frontend;

use Barryvdh\DomPDF\Facade\Pdf;
use PDO;
use Exception;
use Carbon\Carbon;
use Stripe\Refund;
use Stripe\Stripe;
use App\Models\Area;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Record;
use App\Models\Disease;
use App\Models\Product;
use App\Models\Vaccine;
use Twilio\Rest\Client;
use App\Models\AgeGroup;
use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use App\Mail\GeneralMail;
use App\Models\BloodType;
use App\Models\PromoCode;
use App\Models\Recipient;
use App\Models\OrderItems;
use App\Models\Subscriber;
use App\Models\BillingInfo;
use Illuminate\Support\Str;
use App\Models\CouponBanner;
use App\Models\FamilyMember;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\MaritalStatus;
use App\Models\AllergicDisease;
use App\Models\MainTypeAlcohol;
use App\Repositories\OrderRepo;
use App\Models\NotificationType;
use App\Models\ProductFavourite;
use App\Models\RelationshipType;
use App\Models\User as Merchant;
use App\Repositories\CouponRepo;
use App\Models\VaccinationRecord;
use App\Models\CustomNotification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CustomerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\AmountOfAlcoholDrinking;
use App\Models\RecentlyComparedProduct;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use App\Rules\CheckPhoneNumber;
use App\Models\SeoPage;
use App\Models\Territory;
class CustomerController extends Controller
{
    private $couponRepo;
    public function __construct(CouponRepo $couponRepo)
    {
        $this->couponRepo = $couponRepo;
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerValidate(Request $request)
    {
        // if($request->type=='1')
        // {
        //     $this->validate($request, [
        //         'email' => 'required|unique:customers',
        //         'real_code'=>'required',
        //         'code'=>'required',
        //         'password' => 'required|string|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        //     ]);
        // }
        // else
        // {
        //     $this->validate($request, [
        //         'phone' => 'required|unique:customers',
        //         'real_code'=>'required',
        //         'code'=>'required',
        //         'password' => 'required|string|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',

        //     ]);
        // }
        if ($request->code == $request->real_code) {
            $data = [
                // 'first_name'=>$request->first_name,
                // 'last_name'=>$request->last_name,
                // 'dob'=>$request->dob,
                // 'gender'=>$request->gender,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'activation_code' => $request->code,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ];

            $customer = Customer::create($data);
            //createFmailyMemberMyself($customer);
            Auth::guard('customer')->login($customer);

            Session::put('last_used', 'normal');

            return redirect()->route('mediq');
        } else {

            if ($request->email == null) {
                return redirect()->route('get.customer.login')->with(['status' => $request->real_code, 'phone' => $request->phone, 'password' => $request->password, 'message' => 'Invalid code']);
            } else {
                return redirect()->route('get.customer.login')->with(['status' => $request->real_code, 'email' => $request->email, 'password' => $request->password, 'message' => 'Invalid code']);
            }
        }
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function loginValidate(Request $request)
    {
        $input = $request->all();
        if (empty($request->remember)) {
            Session::flush('remember');
        }
        //check with code or not
        if ($request->has_status) {
            if ($request->type == '1') {
                $validator = Validator::make($input, [
                    'email'   => 'required',
                    'code' => 'required',
                    'g-recaptcha-response' => 'required'
                ]);
            } else {
                $validator = Validator::make($input, [
                    'phone'   => 'required',
                    'code' => 'required',
                    'g-recaptcha-response' => 'required'
                ]);
            }
        } else {
            if ($request->type == '1') {

                $validator = Validator::make($input, [
                    'email'   => 'required',
                    'password' => 'required',
                ]);
            } else {
                $validator = Validator::make($input, [
                    'phone'   => 'required',
                    'password' => 'required',
                ]);
            }
        }

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = array(
                'status' => 'fail',
                'msg'    => 'Please check reCAPTCH box.',
            );
            return redirect()->route('get.customer.login');
        } else { // Pass
            if ($request->has_status) {
                if ($request->code == $request->real_code) {
                    if ($request->type == '1') {
                        $customer = Customer::where('email', $input['email'])->first();
                    } else {
                        $customer = Customer::where('phone', $input['phone'])->first();
                    }
                    if ($customer) {

                        Auth::guard('customer')->login($customer, $request->get('remember'));

                        if ($request->remember) {
                            Session::put('remember', [$customer, $request->password]);
                        }
                        return redirect()->route('mediq');
                    } else {
                        $error = array(
                            'status' => 'fail',
                            'msg'    => 'Invalid Email or Password'
                        );
                        return redirect()->route('get.customer.login');
                    }
                } else {

                    if ($request->email == null) {
                        return redirect()->route('get.customer.login')->with(['login-status' => $request->real_code, 'login-phone' => $request->phone, 'login-message' => 'Invalid code']);
                    } else {
                        return redirect()->route('get.customer.login')->with(['login-status' => $request->real_code, 'login-email' => $request->email, 'login-message' => 'Invalid code']);
                    }
                }
            } else {
                if ($request->type == '1') {
                    $customer = Customer::where('email', $input['email'])->first();
                } else {
                    $customer = Customer::where('phone', $input['phone'])->first();
                }

                if ($customer) {
                    if (Hash::check($request->password, $customer->password)) {
                        Auth::guard('customer')->login($customer, $request->get('remember'));
                        if ($request->remember) {
                            Session::put('remember', [$customer, $request->password]);
                        }
                        Session::put('last_used', 'normal');

                        return redirect()->route('mediq');
                    }
                } else {

                    $error = array(
                        'status' => 'fail',
                        'msg'    => 'Invalid Email or Password'
                    );
                    return redirect()->route('get.customer.login');
                }
            }
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('customer')->logout();
        // $request->session()->flush();
        $request->session()->regenerate();
        return response()->json([
            'status' => 200
        ]);
    }

    public function sendSMSVerification(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $receiverNumber = (string)$request->phone;
        $code = random_int(100000, 999999);

        try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            // $twilio_number = getenv("TWILIO_FROM");
            // $verify_sid = getenv("TWILIO_VERIFY_SID");

            $client = new Client($account_sid, $auth_token);

            $verification = $client->verify->v2->services($verify_sid)
                ->verifications
                ->create($request->phone, "sms");
            print($verification->status);

            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $code
            ]);

            return redirect()->back()->with(['status' => $code, 'phone' => $receiverNumber, 'password' => $request->password]);
        } catch (Exception $e) {
            return $e->getMessage()();
        }
    }



    public function sendLoginSMSVerification(Request $request)
    {
        $receiverNumber = (string)$request->phone;
        $code = random_int(100000, 999999);

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            $verify_sid = getenv("TWILIO_VERIFY_SID");

            $client = new Client($account_sid, $auth_token);

            // $verification = $client->verify->v2->services($verify_sid)
            //                     ->verifications
            //                     ->create($request->phone, "sms");
            //                     print($verification->status);

            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $code
            ]);

            return redirect()->back()->with(['login-status' => $code, 'login-phone' => $receiverNumber]);
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }


    public function sendEmailVerification(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $code = random_int(100000, 999999);
        $email = $request->email;
        $password = $request->password;
        Mail::send('frontend.auth.verification-code', ['code' => $code, 'email' => $email, 'password' => $password], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verification Code');
        });
    }

    public function sendLoginEmailVerification(Request $request)
    {
        $code = random_int(100000, 999999);
        $email = $request->email;
        Mail::send('frontend.auth.verification-code', ['code' => $code, 'email' => $email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verification Code');
        });
    }


    public function emailVerification($code, $email, $password)
    {
        return redirect()->route('get.customer.login')->with(['status' => $code, 'email' => $email, 'password' => $password]);
    }

    public function emailLoginVerification($code, $email)
    {
        return redirect()->route('get.customer.login')->with(['login-status' => $code, 'login-email' => $email]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = Customer::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::guard('customer')->login($finduser);
                Session::put('last_used', 'google');
                Session::put('google-login', 'google-login');
                return redirect()->route('mediq');
            } else {
                $customer = Customer::where('email', $user->email)->exists();
                if(!$customer) {
                    $data = [
                        'first_name'   => isset($user->user['given_name']) ? $user->user['given_name'] : '',
                        'last_name'    => isset($user->user['family_name']) ? $user->user['family_name'] : '',
                        'profile_img'=> isset($user->user['picture']) ? $user->user['picture'] : '',
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'email_is_verified' => 1,
                    ];
                    // dd($data);
                    $coupons = Coupon::whereIsPublished(true)->where('coupon_type',1)->get();
                    $customer = Customer::create($data);
                    if(count($coupons) > 0){
                        foreach($coupons as $coupon){
                            CouponCollect::create([
                                'customer_id' => $customer->id,
                                'coupon_id' => $coupon->id,
                            ]);
                        }
                    }
                    createFmailyMemberMyself($customer);
                    $couponBanner = CouponBanner::first();
                    $data = [
                        'email' => $customer->email,
                        'name' => $customer->first_name,
                        'created_at' => $customer->created_at,
                        'coupons' => $coupons,
                        'welcome_reg' => 'welcome_reg',
                        'welcome_img' => $couponBanner->welcome_img,
                    ];
                    Mail::to($data['email'])->send(new GeneralMail($data));
                    Auth::guard('customer')->login($customer);
                    Session::put('last_used', 'google');
                    Session::put('google-register', $customer->email);

                    return redirect()->route('mediq');
                } else {
                    return redirect()->route('mediq')->with('email_exist_msg', 'Email Already exist.Please use other email');
                }
            }
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('mediq');
        }
    }


    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function facebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();
            $finduser = Customer::where('facebook_id', $user->id)->first();

            if ($finduser) {
                // dd('found');
                Auth::guard('customer')->login($finduser);
                Session::put('last_used', 'facebook');

                return redirect()->route('mediq');
            } else {
                // dd($user);
                if(isset($user->email) || $user->email != '') {
                    $customer = Customer::where('email', $user->email)->exists();
                } else {
                    $customer = false ;
                }
                if(!$customer) {
                    $data = [
                        'first_name'   => '',
                        'last_name'    => '',
                        'facebook_id' =>  $user->id
                    ];

                    $customer = Customer::create($data);
                    //createFmailyMemberMyself($customer);
                    Auth::guard('customer')->login($customer);
                    Session::put('last_used', 'facebook');
                    Session::put('facebook-register', $customer->id);

                    return redirect()->route('mediq');
                } else {
                    return redirect()->route('mediq')->with('email_exist_msg', 'Email Already exist.Please use other email');
                }


            }
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('mediq');
        }
    }

    public function dashboardCoupon(Request $request)
    {
        $date = Carbon::now();
        $mainTag = "available";
        $selectedCategory = "all";
        $category = 0;
        if($request->has('mainTag')) {
            $mainTag = $request->mainTag;
        }
        if($request->has("selectedCategory")) {
            $selectedCategory = $request->selectedCategory;
            if($selectedCategory !='all') {
                $category = Category::where("name_en", $selectedCategory)->first();
                if(!$category) {
                    return response()->json("not found");
                }
            }
        }
        $customer_id = auth()->guard('customer')->user()->id;
        //$collectCouponIds = CouponCollect::where("customer_id", $customer_id)->pluck("coupon_id")->toArray();
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
                $isCollected = CouponCollect::where('customer_id',$customer_id)
                                            ->where('coupon_id',$data->id)
                                            ->orderBy("id","DESC")
                                            ->first();
                if($isCollected != null) {
                    $getCoupon = Coupon::where('id', $data->id);
                    if($data->coupon_type === 0 || $data->coupon_type === 1) {
                        if($isCollected->is_available==1) {
                            // check welcome coupon
                            if($data->coupon_type === 1) {
                                $currentDate = date("Y-m-d");
                                $validDate = date('Y-m-d', strtotime($isCollected->created_at. ' +30 days'));
                                if($currentDate <=  $validDate) {
                                    $avaiableCouponsIds[$k] = $getCoupon->first();
                                }
                            }

                            // check birthday coupon
                            if($data->coupon_type === 0) {
                                $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                $birthdayCurrentStartDate = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                $birthdayCurrentEndDate =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                $currentDate = date("Y-m-d");
                                if($currentDate >= $birthdayCurrentStartDate && $currentDate <=$birthdayCurrentEndDate) {
                                    $avaiableCouponsIds[$k] = $getCoupon->first();
                                }
                            }

                            
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
            "coupons.merchant_id",
            "coupons.banner_img",
            "coupons.owner_type",
            "coupons.icon",
            "coupons.coupon_type",
            "coupon_collects.created_at"
        )->leftjoin("coupon_categories", "coupon_categories.coupon_id", "coupons.id")
                            ->join("categories", "coupon_categories.category_id", "categories.id");
        if($selectedCategory != "all") {
            $couponList = $couponList->where("coupon_categories.category_id", $category->id);
        }
        $couponList = $couponList->join("coupon_collects","coupon_collects.coupon_id","coupons.id")
                                 ->where('coupon_collects.customer_id',$customer_id);
        // $currentDate =  date("Y-m-d");
        if($mainTag != 'available') {
            //$couponList = $couponList->whereDate("coupons.end_date", "<", $currentDate);
            //$couponList = $couponList->whereDate('coupons.start_date', '<', $date->format('Y-m-d'))
            //                        ->whereDate('coupons.end_date', '<', $date->format('Y-m-d'));
            //$couponList = $couponList->join("coupon_collects","coupon_collects.coupon_id","coupons.id")
            $couponList = $couponList->whereNotIn('coupon_collects.coupon_id',collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray());
        } else {
            //$couponList = $couponList->whereDate("coupons.end_date", ">=", $currentDate);
            //$couponList = $couponList->whereDate('coupons.start_date', '<=', $date->format('Y-m-d'))
            //                        ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d'));
            $couponList = $couponList->whereIn('coupons.id',collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray());
        }
        //$couponList = $couponList->whereIn("coupons.id", $collectCouponIds)->groupBy("coupons.id")->paginate(10);
        $couponList = $couponList->groupBy("coupons.id")->paginate(10);

        // $totalCouponCount = Coupon::whereIn("coupons.id", collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray())
        //                             ->join("coupon_collects","coupon_collects.coupon_id","coupons.id")
        //                             ->where('coupon_collects.customer_id',$customer_id)
        //                             ->groupBy("coupons.id")
        //                             ->get()->count();
        $totalCouponCount = count(collect(array_filter($avaiableCouponsIds))->pluck('id')->toArray());
        $seo = SeoPage::where("title","my_coupon")->first();
        $data = [
            'main_categories' => Category::whereIsPublished(true)->get(),
            'selectedCategory' =>$selectedCategory,
            'couponList' => $couponList,
            'totalCouponCount' => $totalCouponCount,
            'mainTag' => $mainTag,
            'seo' => $seo
        ];
        if ($request->ajax()) {
            return view('frontend.customer.coupon-data-list', $data)->render();
        } else {
            return view('frontend.customer.coupon-list', $data);
        }
    }

    public function dashboardCouponRedeem(Request $request)
    {
        $couponCode = $request->redeemCode;
        $coupon = Coupon::where("coupon_code", $couponCode)->first();
        if(!$coupon) {
            return response()->json(['status' => 'failed','message'=> trans('labels.coupon_list.enter_redeem_code')]);
        }
        $customer_id = \Auth::guard('customer')->user()->id;
        $exisitingCouponCollect = CouponCollect::where("customer_id", $customer_id)
                                                ->where("coupon_id", $coupon->id)
                                                ->first();
        if($exisitingCouponCollect) {
            return response()->json(['status' => 'failed','message'=>trans('labels.coupon_list.coupon_code_has_been_used')]);
        }
        $coupon = $this->couponRepo->saveCollectCouponInfo($customer_id, $coupon->id);
        if($coupon) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed','message'=>trans('labels.coupon_list.enter_redeem_code')]);
    }

    public function dashboardWishlist(Request $request)
    {
        $mainTag = "favourite";
        $productList = array();
        if($request->has('mainTag')) {
            $mainTag = $request->mainTag;
        }
        $customer_id = \Auth::guard('customer')->user()->id;
        if($mainTag == "favourite") {
            $productFavourite = ProductFavourite::where("customer_id", $customer_id)->pluck("product_id")->toArray();
            $productList = Product::whereIn("id", $productFavourite)->paginate(8);
        }
        if($mainTag == "recently-viewed") {
            $productList = Product::whereIn("id", [])->paginate(2);
            if($request->session()->has('recentlyViewedProducts')) {
                $recentViewProducts = $request->session()->get('recentlyViewedProducts');
                if(count($recentViewProducts) > 0) {
                    $recentViewProducts= array_unique($recentViewProducts);
                    $recentViewProducts=array_slice($recentViewProducts, -5);
                    $productList = Product::whereIn("id", $recentViewProducts)->paginate(8);
                }
            }
        }
        if($mainTag == "recently-compared") {
            $latestIds   = RecentlyComparedProduct::where("customer_id", $customer_id)->orderBy("updated_at", "DESC")->limit(5)->pluck("id")->toArray();
            $productList = RecentlyComparedProduct::whereIn("id", $latestIds)->orderBy("updated_at", "DESC")->paginate(8);
        }
        $data = array();
        $seo = SeoPage::where("title","my_favourite")->first();
        $data = [
            'productList' => $productList,
            'mainTag' => $mainTag,
            'main_categories' => Category::whereIsPublished(true)->get(),
            'seo' => $seo
        ];
        if ($request->ajax()) {
            return view('frontend.customer.wishlist-data-list', $data)->render();
        } else {
            return view('frontend.customer.wishlist', $data);
        }
    }

    public function dashboardProductFavourite(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::where("id", $product_id)->first();
        if(!$product) {
            return response()->json(['status' => 'failed']);
        }
        $customer_id = \Auth::guard('customer')->user()->id;


        $exisitingProductFavourite = ProductFavourite::where("customer_id", $customer_id)
                                                ->where("product_id", $product->id)
                                                ->first();
        if($exisitingProductFavourite) {
            $exisitingProductFavourite->delete();

            $productList = Product::select("products.*")
            ->join("product_favourite","product_favourite.product_id","products.id")
            ->where("product_favourite.customer_id",$customer_id)
            ->get();
            return response()->json(['status' => 'success',"data"=> $productList ]);
        }
        $product = ProductFavourite::create([
                        "customer_id"=>$customer_id,
                        "product_id"=> $product->id,
                ]);
        $productList = Product::select("products.*")
                                ->join("product_favourite","product_favourite.product_id","products.id")
                                ->where("product_favourite.customer_id",$customer_id)
                                ->get();

        if($product) {
            return response()->json(['status' => 'success',"data"=> $productList ]);
        }
        return response()->json(['status' => 'failed']);
    }

    public function dashboardRemoveRecentlyCompared(Request $request)
    {
        $recentlyComparedProduct = RecentlyComparedProduct::where("id", $request->id)->first();
        if($recentlyComparedProduct) {
            $recentlyComparedProduct->delete();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }

    public function setting(Request $request) {
        $seo = SeoPage::where("title","setting")->first();
        $customNoti = CustomNotification::get();
        $notiType   = NotificationType::get();
        $data = [
            'customNoti' => $customNoti,
            'notiType' => $notiType,
            'seo'=> $seo
        ];
        return view('frontend.customer.myacc-setting',$data);
    }

    public function changePassword(ChangePasswordRequest $request){
        $customer_id = auth()->guard('customer')->user()->id;
        $customer = Customer::where("id",$customer_id)->update(["password"=>Hash::make($request->newPassword)]);
        return response()->json(['status' => 'success']);
    }

    public function updatenNotification(Request $request){
        if($request->customNotificationId <= 3) {
            $updateNoti  =  CustomerNotification::where("customer_id", $request->customerId)
                                ->where("custom_notification_id", $request->customNotificationId)
                                ->where("notification_type_id", $request->notificationTypeId)
                                ->first();
            if($updateNoti) {
                $updateNoti->delete();
                return response()->json(['status' => 'success']);
            }
            $newNoti = new CustomerNotification();
            $newNoti->customer_id = $request->customerId;
            $newNoti->custom_notification_id = $request->customNotificationId;
            $newNoti->notification_type_id = $request->notificationTypeId;
            $newNoti->save();
            return response()->json(['status' => 'success']);
        }else {
          
            $updateNoti  =  CustomerNotification::where("customer_id", $request->customerId)
                            ->where("custom_notification_id", $request->customNotificationId)
                            ->where("notification_type_id", $request->notificationTypeId)
                            ->first();
            if(!$updateNoti) {
                $newNoti = new CustomerNotification();
                $newNoti->customer_id = $request->customerId;
                $newNoti->custom_notification_id = $request->customNotificationId;
                $newNoti->notification_type_id = $request->notificationTypeId;
                $newNoti->save();
                $oldNoti = CustomerNotification::where("customer_id", $request->customerId)
                ->where("custom_notification_id", $request->customNotificationId)
                ->where("notification_type_id","<>", $request->notificationTypeId)
                ->get();
                foreach($oldNoti as $oldData) {
                    $oldData->delete();
                }
                return response()->json(['status' => 'success']);
            }
          
        }
       
    }

    public function dashboard(Request $request) {
        /**
        $booking_list = OrderItems::select(
                            "order_items.orders_id",
                            "order_items.product_id",
                            "products.name_en",
                            "products.name_tc",
                            "products.name_sc",
                            "products.is_two_recipient",
                            "products.featured_img",
                            DB::raw("GROUP_CONCAT(order_items.created_at) AS order_createtime_list"),
                            DB::raw("GROUP_CONCAT(order_items.id) AS order_ids_list"),
                            DB::raw("GROUP_CONCAT(order_items.order_status) AS order_status_list"),
                            DB::raw("GROUP_CONCAT(order_items.recipient_id) AS recipients_list"),
                            DB::raw("GROUP_CONCAT(IFNULL(concat(recipients.first_name,' ',recipients.last_name),'null')) AS recipients_name_list"),
                            DB::raw("GROUP_CONCAT(IFNULL(recipients.date,'-')) AS recipients_date_list"),
                            DB::raw("GROUP_CONCAT(IFNULL(recipients.time,'-')) AS recipients_time_list"),
                            DB::raw("GROUP_CONCAT(IFNULL(order_items.booking_id,'')) AS booking_id_list"),
                            DB::raw("GROUP_CONCAT(IFNULL(recipients.location,'')) AS location_list"))
                            ->join("products","products.id","order_items.product_id")
                            ->join("recipients","recipients.id","order_items.recipient_id")
                            ->groupBy("order_items.orders_id","order_items.product_id")
                            ->orderBy("order_items.orders_id","DESC")
                            ->limit(5)
                            ->get();
        */
        // $booking_list =  Recipient::select("recipients.*")
        //                         //->where(DB::raw("recipients.date >= Now()"))
        //                         ->whereNotNull('recipients.date')
        //                         ->orderBy("recipients.date","ASC")
        //                         ->limit(5)
        //                         ->get();
        $booking_list =     DB::select("
                                select recipients.*, products.id as product_id,products.slug_en,
                                products.name_en,products.name_tc,products.name_sc,products.is_two_recipient,
                                order_items.booking_id,order_items.order_status,order_items.orders_id,
                                order_items.created_at as order_create_date,categories.name_en as category_name_en
                                from recipients
                                join order_items on recipients.id=order_items.recipient_id
                                join products on products.id=recipients.product_id
                                join categories on categories.id=products.category_id
                                where recipients.date >= ? and recipients.customer_id=?
                                and recipients.date is not null
                                and order_items.order_status in (1,2,3)
                                group by recipients.product_id,order_items.orders_id
                                order by recipients.date ASC limit 5
                            ",[date('Y-m-d'),auth()->guard('customer')->user()->id]);
        $seo = SeoPage::where("title","overview")->first();
        $data = [
            'booking_list' => $booking_list,
            'main_categories' => Category::whereIsPublished(true)->get(),
            'seo'=>$seo
        ];
        return view('frontend.customer.dashboard',$data);
    }

    public function dashboardBooking(Request $request) {
        $progressList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at")
                                    ->leftJoin("orders","orders.id","order_items.orders_id")
                                    ->leftJoin("products","products.id","order_items.product_id")
                                    ->whereIn("order_status",[1,2,3])
                                    ->where("orders.customer_id",auth()->guard('customer')->user()->id)
                                    ->groupBy("order_items.orders_id")
                                    ->orderBy("orders.created_at","DESC")
                                    ->get();
        $progressItemsList = OrderItems::select("order_items.*")
                                        ->leftJoin("orders","orders.id","order_items.orders_id")
                                        ->whereIn("order_items.order_status",[1,2,3])
                                        ->where("orders.customer_id",auth()->guard('customer')->user()->id)
                                        ->get();
        $completedList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at",
                                        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time")
                                        ->leftJoin("orders","orders.id","order_items.orders_id")
                                        ->leftJoin("products","products.id","order_items.product_id")
                                        ->leftJoin("recipients","recipients.id","order_items.recipient_id")
                                        ->whereIn("order_status",[4])
                                        ->where("orders.customer_id",auth()->guard('customer')->user()->id)
                                        ->groupBy("order_items.orders_id")
                                        ->orderBy("orders.created_at","DESC")
                                        ->get();
        $cancelledList = OrderItems::select("order_items.orders_id","orders.payment_status","orders.invoice_no","orders.grand_total","orders.created_at",
                                        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time")
                                        ->leftJoin("orders","orders.id","order_items.orders_id")
                                        ->leftJoin("products","products.id","order_items.product_id")
                                        ->leftJoin("recipients","recipients.id","order_items.recipient_id")
                                        ->whereIn("order_status",[5,6,7])
                                        ->where("orders.customer_id",auth()->guard('customer')->user()->id)
                                        ->groupBy("order_items.orders_id")
                                        ->orderBy("orders.created_at","DESC")
                                        ->get();
        $seo = SeoPage::where("title","my_booking")->first();
        $data = [
            'progressList' => $progressList,
            'progressItemsList'=>$progressItemsList,
            'completedList' => $completedList,
            'cancelledList' => $cancelledList,
            'main_categories' => Category::whereIsPublished(true)->get(),
            'seo' => $seo
        ];
        return view('frontend.customer.dashboard-booking',$data);
    }

    public function basicInfo(Request $request) {

        $personalInfo   = Customer::select(
                                    "customers.title_full_name",
                                    "customers.first_name",
                                    "customers.last_name",
                                    "customers.user_name",
                                    "customers.email",
                                    "customers.phone",
                                    "customers.address",
                                    "customers.country",
                                    "customers.district_id",
                                    "customers.area_id",
                                    "customers.dob",
                                    "customers.profile_img",
                                    "customers.google_id",
                                    "customers.facebook_id",
                                    "customers.is_verified",
                                    "customers.email_is_verified",
                                    "customers.id"
                                    )->where("id",auth()->guard('customer')->user()->id)->first();
        $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
        $vaccinationList = Vaccine::get();
        $ageGroupList = AgeGroup::get();
        $bloodType = BloodType::get();
        $maritalStatus = MaritalStatus::get();
        $mainTypeOfAlcohol = MainTypeAlcohol::get();
        $amountOfAlcoholDrinking = AmountOfAlcoholDrinking::get();
        $disease = Disease::get();
        $allergicDisease = AllergicDisease::get();
        $relationship = RelationshipType::get();
        $districtList = District::whereIsPublished(true)->get();
        $areaList = Territory::whereIsPublished(true)->get();
        $seo = SeoPage::where("title","account_information")->first();
        $data = [
            'personalInfo' => $personalInfo,
            'familyMembers' =>$familyMembers,
            "vaccinationList"=>$vaccinationList,
            "ageGroupList"=>$ageGroupList,
            "bloodType"=>$bloodType,
            "maritalStatus"=>$maritalStatus,
            "mainTypeOfAlcohol"=>$mainTypeOfAlcohol,
            "amountOfAlcoholDrinking"=>$amountOfAlcoholDrinking,
            "disease"=>$disease,
            "allergicDisease"=>$allergicDisease,
            "relationship" => $relationship,
            "districtList"=>$districtList,
            "areaList"=>$areaList,
            'seo' => $seo
        ];
        return view('frontend.customer.myacc-basicinfo',$data);
    }

    public function changePersonalInfo(Request $request){
        $request->validate([
            'email' => ["nullable","email","unique:customers,email,".auth()->guard('customer')->user()->id],
            'phone' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i","unique:customers,phone,".auth()->guard('customer')->user()->id,new CheckPhoneNumber]
        ]);
        $personalInfo = Customer::find(auth()->guard('customer')->user()->id);
        $personalInfo->title_full_name = $request->title_full_name;
        $personalInfo->first_name = $request->first_name;
        $personalInfo->last_name = $request->last_name;
        $personalInfo->address = $request->address;
        $personalInfo->dob = date("Y-m-d",strtotime(str_replace('/', '-', $request->dob)));
        if($personalInfo->phone != $request->phone) {
            $request->session()->forget('phone');
            $request->session()->put('phone', empty($request->phone)?'-':$request->phone);
        }else{
            $request->session()->forget('phone');
        }
        //$personalInfo->phone = $request->phone;
        $personalInfo->email = $request->email;
        $personalInfo->country = $request->country;
        $personalInfo->district_id = $request->district_id;
        $personalInfo->area_id = $request->area_id;
        $personalInfo->save();

        $familyMemberInfo = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->first();
        if($familyMemberInfo) {
            $familyMemberInfo->first_name = $request->first_name;
            $familyMemberInfo->last_name = $request->last_name;
            //$familyMemberInfo->phone = $request->phone;
            $familyMemberInfo->email = $request->email;
            $familyMemberInfo->dob = date("Y-m-d",strtotime(str_replace('/', '-', $request->dob)));
            $familyMemberInfo->save();
        }
        $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
        return response()->json(['status' => 'success','data'=>$personalInfo,'familyMembers'=>$familyMembers]);

    }

    public function fileUpload(Request $request) {
        $request->validate([
            'file' => 'mimes:png,jpg,svg|max:2048',
        ]);
        $personalInfo = Customer::select("customers.*")->where("id",auth()->guard('customer')->user()->id)->first();
        $personalInfo->first_name = $request->f_name_1;
        if(isset($request->file)) {
            if($personalInfo->profile_img != null) {
                if(File::exists(public_path('storage/customer').'/'.$personalInfo->profile_img)){
                    unlink(public_path('storage/customer').'/'.$personalInfo->profile_img);
                }

            }
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('storage/customer'), $fileName);
            $personalInfo->profile_img = $fileName;
        }
        $personalInfo->save();

        $familyMemberInfo = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->first();
        if($familyMemberInfo) {
            $familyMemberInfo->first_name = $request->f_name_1;
            if(isset($request->file)) {
                $familyMemberInfo->profile_img = $fileName;
            }
            $familyMemberInfo->save();
        }
        $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
        return response()->json(['status' => 'success','data'=>$personalInfo,'familyMembers'=>$familyMembers]);
    }

    public function saveFamilyMemberInfo(Request $request) {
        $request->validate([
            'first_name'   => ["required"],
            'last_name' =>["required"],
            'relationship_type_id' => ["required"],
            'email' => ["nullable","email"],
            'phone' => ["nullable","regex:/^(\+?\d{2,3})(\d{8})$/i",new CheckPhoneNumber]
        ],[
            // 'first_name.required' => 'First name is required.', 
            // 'last_name.required' => 'Last name is required.',
            // 'relationship_type_id.required' => 'Family relationship is required.',
        ]);
        if(isset($request->delete_id)){
            $familyMemberInfo = FamilyMember::find($request->delete_id);
            $familyMemberInfo->delete();
            $process = "delete";
            $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
            return response()->json(['status' => 'success','process'=>$process,'familyMembers'=>$familyMembers]);
        };
        if($request->id == 0) {
            $familyMemberInfo = new FamilyMember();
            $process = "create";
        }else{
            $familyMemberInfo = FamilyMember::find($request->id);
            $process = "update";
        }


        $familyMemberInfo->gender = $request->gender;
        $familyMemberInfo->dob = $request->dob!=null?date("Y-m-d",strtotime(str_replace('/', '-', $request->dob))):NULL;
        $familyMemberInfo->first_name = $request->first_name;
        $familyMemberInfo->last_name = $request->last_name;
        if($request->relationship_type_id!=1){
            $familyMemberInfo->email = $request->email;
            $familyMemberInfo->phone = $request->phone;
        }

        $familyMemberInfo->id_type = $request->id_type;
        $familyMemberInfo->id_number = $request->id_number;
        $familyMemberInfo->relationship_type_id = $request->relationship_type_id;
        $familyMemberInfo->customer_id = auth()->guard('customer')->user()->id;
        $familyMemberInfo->save();

        if($request->relationship_type_id == 1) {
            $customer = Customer::where("id",auth()->guard('customer')->user()->id)->first();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->gender = $request->gender;
            $customer->dob = $request->dob!=null?date("Y-m-d",strtotime(str_replace('/', '-', $request->dob))):NULL;
            $customer->save();
        }



        $relationship = FamilyMember::find($familyMemberInfo->id)->relationship->name;
        $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
        $vaccinationList = Vaccine::get();
        $ageGroupList = AgeGroup::get();
        return response()->json([
                                'status' => 'success',
                                'data'=>$familyMemberInfo,
                                'relationship'=>$relationship,
                                'process'=>$process,
                                'familyMembers'=>$familyMembers,
                                "vaccinationList"=>$vaccinationList,
                                "ageGroupList"=>$ageGroupList
                                ]);
    }

    public function getVaccineInfo(Request $request) {
        $vaccineInfo = VaccinationRecord::select(
                                        "vaccination_record.id",
                                        "vaccine.name_en as vaccine_name_en",
                                        "vaccine.name_sc as vaccine_name_sc",
                                        "vaccine.name_tc as vaccine_name_tc",
                                        "age_group.name_en as age_group_name_en",
                                        "age_group.name_sc as age_group_name_sc",
                                        "age_group.name_tc as age_group_name_tc",
                                        "vaccination_date",
                                        "remarks",
                                        "family_member_id")
                                        ->join("vaccine","vaccine.id","vaccination_record.vaccine_id")
                                        ->join("age_group","age_group.id","vaccination_record.age_group_id")
                                        ->where('family_member_id',$request->family_member_id)->get();
        return response()->json(['status' => 'success','data'=>$vaccineInfo]);
    }

    public function saveVaccineInfo(Request $request) {
       // \Log::debug($request);
        if($request->vaccination_record_id== 0) {
            $vaccineInfo = new VaccinationRecord();
            $process = "create";
        }else{
            $vaccineInfo = VaccinationRecord::find($request->vaccination_record_id);
            $process = "update";
        }
            $vaccineInfo->family_member_id = $request->family_member_id;
            $vaccineInfo->vaccine_id = $request->vaccine_id;
            $vaccineInfo->age_group_id = $request->age_group_id;
            $vaccineInfo->remarks = $request->remarks;
            $vaccineInfo->vaccination_date = date("Y-m-d",strtotime(str_replace('/', '-', $request->vaccination_date)));
            $vaccineInfo->save();
            return response()->json(['status' => 'success','data'=>$vaccineInfo, 'process'=>$process]);
    }

    public function getVaccineDetailsInfo(Request $request) {
        $vaccineInfo = VaccinationRecord::select(
                                                "vaccination_record.*",
                                                "vaccine.name_en as vaccine_name_en",
                                                "vaccine.name_sc as vaccine_name_sc",
                                                "vaccine.name_tc as vaccine_name_tc",
                                                "age_group.name_en as age_group_name_en",
                                                "age_group.name_sc as age_group_name_sc",
                                                "age_group.name_tc as age_group_name_tc",
                                                DB::raw("DATE_FORMAT(vaccination_record.vaccination_date,'%d/%m/%Y') AS vaccination_date")
                                                )
                                                ->join("vaccine","vaccine.id","vaccination_record.vaccine_id")
                                                ->join("age_group","age_group.id","vaccination_record.age_group_id")
                                                ->where('vaccination_record.id',$request->vaccination_record_id)
                                                ->first();

        return response()->json(['status' => 'success','data'=>$vaccineInfo]);
    }

    public function getHealthRecordInfo(Request $request) {
        $healthRecordInfo = HealthRecord::select(
                        "health_record.*",
                        "blood_type.name_en as blood_type_name_en",
                        "blood_type.name_sc as blood_type_name_sc",
                        "blood_type.name_tc as blood_type_name_tc",
                        "maritial_status.name_en as maritial_status_name_en",
                        "maritial_status.name_sc as maritial_status_name_sc",
                        "maritial_status.name_tc as maritial_status_name_tc"
                        )
                        ->leftjoin("blood_type","blood_type.id","health_record.blood_type_id")
                        ->leftjoin("maritial_status","maritial_status.id","health_record.maritial_status_id")
                        ->where('health_record.family_member_id',$request->family_member_id)
                        ->first();
        if($healthRecordInfo) {
            $healthRecordInfo->personal_medicial_history_list = unserialize($healthRecordInfo->personal_medicial_history_list);
            $healthRecordInfo->family_medicial_history_list = unserialize($healthRecordInfo->family_medicial_history_list);
            $healthRecordInfo->allergic_history_list = unserialize($healthRecordInfo->allergic_history_list);
        }
        return response()->json(['status' => 'success','data'=>$healthRecordInfo]);
    }

    public function saveHealthRecordInfo(Request $request) {
        if(isset($request->delete_id)){
            $oldHealthRecordInfo = HealthRecord::find($request->delete_id);
            $oldHealthRecordInfo->delete();
            $process = "delete";
            return response()->json(['status' => 'success','process'=>$process]);
        };
        if($request->health_record_id== 0) {
            $healthRecordInfo = new HealthRecord();
            $process = "create";
        }else{
            $healthRecordInfo = HealthRecord::find($request->health_record_id);
            $process = "update";
        }
            $healthRecordInfo->family_member_id = $request->family_member_id;
            $healthRecordInfo->blood_type_id = $request->blood_type_id;
            $healthRecordInfo->maritial_status_id = $request->maritial_status_id;
            $healthRecordInfo->height = $request->height;
            $healthRecordInfo->weight = $request->weight;
            $healthRecordInfo->drinking = $request->drinking;
            $healthRecordInfo->main_type_of_alcohol_id = $request->main_type_of_alcohol_id;
            $healthRecordInfo->amount_of_alcohol_drinking_id = $request->amount_of_alcohol_drinking_id;
            $healthRecordInfo->drinking_age = $request->drinking_age;
            $healthRecordInfo->smoking = $request->smoking;
            $healthRecordInfo->smoking_age = $request->smoking_age;
            $healthRecordInfo->no_of_cigarettes_per_day_stick = $request->no_of_cigarettes_per_day_stick;
            $healthRecordInfo->liver_function = $request->liver_function;
            $healthRecordInfo->input_abnormal_liver_function_index = $request->input_abnormal_liver_function_index;
            $healthRecordInfo->renal_function = $request->renal_function;
            $healthRecordInfo->input_abnormal_renal_function_index = $request->input_abnormal_renal_function_index;
            $healthRecordInfo->personal_medicial_history = $request->personal_medicial_history;
            $healthRecordInfo->personal_medicial_history_list = serialize($request->personal_medicial_history_list);
            $healthRecordInfo->family_medicial_history = $request->family_medicial_history;
            $healthRecordInfo->family_medicial_history_list = serialize($request->family_medicial_history_list);
            $healthRecordInfo->allergic_history = $request->allergic_history;
            $healthRecordInfo->allergic_history_list = serialize($request->allergic_history_list);

            $healthRecordInfo->save();
            $healthRecordInfo->personal_medicial_history_list = unserialize($healthRecordInfo->personal_medicial_history_list);
            $healthRecordInfo->family_medicial_history_list = unserialize($healthRecordInfo->family_medicial_history_list);
            $healthRecordInfo->allergic_history_list = unserialize($healthRecordInfo->allergic_history_list);
            return response()->json(['status' => 'success','data'=>$healthRecordInfo,'process'=>$process]);

    }

    public function bookingDetails($order_id,$download=null) {
        $checkOrderDetails = Order::where("id",$order_id)->first();
        if(!$checkOrderDetails) {
            return view('errors.404');
        }
        if($checkOrderDetails->customer_id != auth()->guard('customer')->user()->id){
            return view('errors.404');
        }
        if($checkOrderDetails->payment_status == 2) {
            $customer = auth()->guard('customer')->user();
            $recipientIds = OrderItems::where("orders_id",$order_id)->pluck("recipient_id")->toArray();
            //Recipient::whereIn("id",$recipientIds)->update(["is_ordered_checkout"=>1]);
            $recipients = Recipient::select('recipients.*')
            ->join('products','recipients.product_id','=','products.id')
            ->where('recipients.customer_id',$customer->id)
            ->where('recipients.is_ordered_checkout',1)
            ->where('products.is_two_recipient',0)
            ->whereIn("recipients.id",$recipientIds)
            ->get();
            $isTwoRecipients = Recipient::select('recipients.*')
            ->join('products','recipients.product_id','=','products.id')
            ->where('recipients.customer_id',$customer->id)
            ->where('recipients.is_ordered_checkout',1)
            ->where('products.is_two_recipient',1)
            ->whereIn("recipients.id",$recipientIds)
            ->get();
            $summaryData = new \stdClass();
            $summaryData->offlinePayment = false;
            $summaryData->currentOrderId = $order_id;
            $total_amounts = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices') +$isTwoRecipients->sum('each_recipient_amount') + $isTwoRecipients->sum('add_on_prices');
            $summaryData->totalAmount = $total_amounts;
            $summaryData->codeType = NULL;
            $summaryData->codeId = NULL;
            $summaryData->codePrice = 0;
            if($checkOrderDetails->coupon_id != null) {
                $summaryData->codeType = "coupon";
                $summaryData->codeId = $checkOrderDetails->coupon_id;
                $summaryData->codePrice = $checkOrderDetails->coupon_amount;
                $coupon = Coupon::where('id',$checkOrderDetails->coupon_id)->first();
                $summaryData->discount_type = $coupon->discount_type;
            }
            if($checkOrderDetails->promo_code_id != null) {
                $summaryData->codeType = "promo_code";
                $summaryData->codeId = $checkOrderDetails->promo_code_id;
                $summaryData->codePrice = $checkOrderDetails->promo_code_amount;
                //$promoCode = PromoCode::where('id',$checkOrderDetails->promo_code_id)->first();
                $summaryData->discount_type = "amount";
            }
            //\Log::debug($summaryData);
            Session::put('summaryData',$summaryData);
        }
        if($download!=null) {
            $customer = auth()->guard('customer')->user();
            $customerInfo = Customer::find($customer->id);
            //$address = ($customerInfo->address!=null?$customerInfo->address.',<br/>':''). ($customerInfo->district_id!==null?$customerInfo->district->name_en.',':'').($customerInfo->area_id!=null?$customerInfo->area->name_en.',':'').'HONG KONG';
            $order    = Order::find($order_id);
            $billingInfo = BillingInfo::where("order_id",$order->id)->first();
            $billing_customer_name = "";
            $billing_customer_address = "";
            if($billingInfo) {
                $billing_customer_name = $billingInfo->name;
                if(isset($billingInfo->address)){
                    $billing_customer_address .= "$billingInfo->address, ";
                }
                if(isset($billingInfo->district_id)){
                    $districts = District::find($billingInfo->district_id);
                    $billing_customer_address .= "$districts->name_en, ";
                }
                if(isset($billingInfo->territory_id)){
                    $territory = Territory::find($billingInfo->territory_id);
                    $billing_customer_address .= "$territory->name_en, ";
                }
                $billing_customer_address .= "HONG KONG";
            }
            // if(!$billingInfo) {
            //     BillingInfo::create([
            //         'name' => $customer->first_name .' '. $customer->last_name,
            //         'email' => $customer->email,
            //         'customer_id' => $customer->id,
            //         'order_id' => $order->id,
            //     ]);
            // }
            $coupon_type = "coupon";
            $coupon_price = 0;
            $coupon_discount_type = "amount";
            if($checkOrderDetails->coupon_id != null) {
                $coupon_price = $checkOrderDetails->coupon_amount;
                $coupon_discount_type = $checkOrderDetails->coupon->discount_type;
            }
            if($checkOrderDetails->promo_code_id != null) {
                $coupon_price = $checkOrderDetails->promo_code_amount;
                $coupon_type = "promo";
            }
            $recipientIds = OrderItems::where("orders_id",$order_id)->pluck("recipient_id")->toArray();
            $customerInfo = [
                'email' => $customer->email,
                'name' => $customer->first_name .' '. $customer->last_name,
                'card_type' => $order->payment_type,
                'order_processing_mail' => 'order_processing_mail',
                //'address' => $address,
                'order_no' => $checkOrderDetails->invoice_no,
                'order_date' => $checkOrderDetails->created_at,
                'total_amount' => $checkOrderDetails->grand_total,
                'customer_id' => $customer->id,
                'coupon_price'=>$coupon_price,
                'coupon_discount_type'=>$coupon_discount_type,
                'coupon_type'=>$coupon_type,
                'sub_total'=>$checkOrderDetails->grand_total+$coupon_price,
                'recipientIds'=> $recipientIds,
                'card_name' => $checkOrderDetails->card_name,
                'billing_customer_name'=>$billing_customer_name,
                'billing_customer_address'=>$billing_customer_address,
            ];
            $data = [];
            $data['print'] = 'yes';
            $data['order'] = $order;
            $data['customerInfo'] = $customerInfo;
            $data['seo'] =SeoPage::where("title","my_booking_details")->first();
            foreach($order->orderItems as $key => $item){
                if($item->recipient->product->is_two_recipient == false){
                    $data['sample'][$key] = $item;
                }
                if($item->recipient->product->is_two_recipient == true){
                    $data['two_person_plan'][$key] = $item;
                }
            }
           // $customPaper = [0, 0, 567.00, 500.80];
            $pdf = Pdf::loadView('pdf.ereceipt',['data'=>$data])->setPaper("A4", "portrait"); //load view page
            //$pdf = PDF::loadView('pdf.ereceipt',['data'=>$data]);
            return $pdf->download('pdfview.pdf');
        }
        return view('frontend.customer.dashboard-booking-details',["data"=>$checkOrderDetails]);
    }

    public function payslipUpload(Request $request) {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpg,pdf|max:10240',
        ]);
        $orderInfo = Order::select("orders.*")->where("id",$request->order_id)->first();
        if(isset($request->file)) {
            if($orderInfo->payslip != null) {
                unlink(public_path('storage/orders').'/'.$orderInfo->payslip);
            }
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('storage/orders'), $fileName);
            $orderInfo->payslip = $fileName;
        }
        $orderInfo->payment_type = $request->payment_type;
        $orderInfo->payment_status = 3;
        $orderInfo->save();

        return response()->json(['status' => 'success','data'=>$orderInfo]);
    }

    public function sendEReceipt(Request $request) {
        $customer = auth()->guard('customer')->user();
        $order    = Order::find($request->order_id);
        $billingInfo = BillingInfo::where("order_id",$order->id)->first();
        $billing_customer_name = "";
        $billing_customer_address = "";
        if($billingInfo) {
            $billing_customer_name = $billingInfo->name;
            if(isset($billingInfo->address)){
                $billing_customer_address .= "$billingInfo->address, ";
            }
            if(isset($billingInfo->district_id)){
                $districts = District::find($billingInfo->district_id);
                $billing_customer_address .= "$districts->name_en, ";
            }
            if(isset($billingInfo->territory_id)){
                $territory = Territory::find($billingInfo->territory_id);
                $billing_customer_address .= "$territory->name_en, ";
            }
            $billing_customer_address .= "HONG KONG";
                
        }
        $customerInfo = [
            'id' => $order->id,
            'email' => $request->email,
            'name' => $request->name,
            'card_type' => $order->card_name,
            'order_ereceipt_mail' => 'order_ereceipt_mail',
            'postal_address' => $request->postal_address,
            'invoice_no'=>$order->invoice_no,
            'billing_customer_name'=>$billing_customer_name,
            'billing_customer_address'=>$billing_customer_address,
            'customer_id' => $customer->id
        ];
        $datas = [];
        $datas['print'] = 'yes';
        $datas['order'] = $order;
        $datas['customerInfo'] = $customerInfo;
        foreach($order->orderItems as $key => $item){
            if($item->recipient->product->is_two_recipient == false){
                $datas['sample'][$key] = $item;
            }
            if($item->recipient->product->is_two_recipient == true){
                $datas['two_person_plan'][$key] = $item;
            }
        }
        Mail::to($request->email)->send(new GeneralMail($datas));
        return response()->json(['status' => 'success']);

    }

    public function downloadEReceipt(Request $request) {
        $customer = auth()->guard('customer')->user();
        $order    = Order::find($request->order_id);
        $billingInfo = BillingInfo::where("order_id",$order->id)->first();
        if(!$billingInfo) {
            BillingInfo::create([
                'name' => $customer->first_name .' '. $customer->last_name,
                'email' => $customer->email,
                'address' => $customer->address,
                'customer_id' => $customer->id,
                'order_id' => $order->id,
            ]);
        }
        $customerInfo = [
            'email' => $customer->email,
            'name' => $customer->first_name .' '. $customer->last_name,
            'card_type' => $order->payment_type,
            'order_processing_mail' => 'order_processing_mail',
        ];
        $datas = [];
        $datas['print'] = 'yes';
        $datas['order'] = $order;
        $datas['customerInfo'] = $customerInfo;
        foreach($order->orderItems as $key => $item){
            if($item->recipient->product->is_two_recipient == false){
                $datas['sample'][$key] = $item;
            }
            if($item->recipient->product->is_two_recipient == true){
                $datas['two_person_plan'][$key] = $item;
            }
        }
        $pdf = PDF::loadView('email.orders.receipt',$datas); //load view page
        return $pdf->download('pdfview.pdf');
    }

    public function uploadCancelRefund(Request $request) {
        if(!$request->has("cancellation_selectsingle")) {
            return response()->json(['status' => 'failed1']);
        }
        if($request->has("cancellation_selectsingle")) {
            foreach($request->cancellation_selectsingle as $order_item_id){
                $field = 'reasons_cancelled'.$order_item_id;
                if(!isset($request->{$field})){
                    return response()->json(['status' => 'failed2']);
                }
            }
        }
        $totalRefund = 0;
        $orderIdList = [];
        foreach($request->cancellation_selectsingle as $order_item_id){
            if(in_array($order_item_id, $orderIdList) == false) {
                $field = 'reasons_cancelled'.$order_item_id;
                $orderItem = OrderItems::find($order_item_id);
                $totalRefund += $orderItem->total;
                $orderItem->order_status = 6;
                $orderItem->cancel_reason = $request->{$field};

                if($orderItem->product->is_two_recipient == 1) {
                    $recipientsIds = [];
                    $recipientsIds = OrderItems::select("id")
                                                        ->where("orders_id", $orderItem->orders_id)
                                                        ->where("product_id", $orderItem->product_id)
                                                        ->whereIn("order_status", [1,2,3])
                                                        ->pluck("id")->toArray();
                    $index = array_search($orderItem->id, $recipientsIds);
                    array_push($orderIdList, $orderItem->id);
                    $orderItem->save();
                    $twopersondataId =  $recipientsIds[$index + 1];
                    $twopersonOrderItem = OrderItems::find($twopersondataId);
                    $twopersonOrderItem->order_status = 6;
                    $twopersonOrderItem->cancel_reason = $request->{$field};
                    $twopersonOrderItem->save();
                    array_push($orderIdList, $twopersonOrderItem->id);
                }else {
                    array_push($orderIdList, $orderItem->id);
                    $orderItem->save();
                }
                
            }
        }
        
        $orderInfo = Order::find($request->order_id);
        // check online payment success
        //\Log::debug($totalRefund);
        //if($orderInfo->payment_status == 1) {
            // $stripe_secret_key = config('app.stripe_secret') ;
            // Stripe::setApiKey($stripe_secret_key);
            // $refund = Refund::create([
            //     'charge' => $orderInfo->stripe_payment_id,
            //     'amount' => str_replace(".", "",number_format($totalRefund, 2, '.', '')),
            //     'reason' => 'requested_by_customer'
            // ]);

            // foreach($orderIdList as $id){
            //     $data = OrderItems::find($id);
            //     $data->order_status = 7;
            //     $data->save();
            // }
        //}
        return response()->json(['status' => 'success']);
    }

    public function healthProfile(Request $request) {

        $personalInfo   = Customer::select(
                                    "customers.title_full_name",
                                    "customers.first_name",
                                    "customers.last_name",
                                    "customers.user_name",
                                    "customers.email",
                                    "customers.phone",
                                    "customers.address",
                                    "customers.dob",
                                    "customers.profile_img",
                                    "customers.google_id",
                                    "customers.facebook_id",
                                    "customers.is_verified",
                                    "customers.email_is_verified",
                                    )->where("id",auth()->guard('customer')->user()->id)->first();
        $familyMembers  = FamilyMember::where("customer_id",auth()->guard('customer')->user()->id)->get();
        $vaccinationList = Vaccine::get();
        $ageGroupList = AgeGroup::get();
        $bloodType = BloodType::get();
        $maritalStatus = MaritalStatus::get();
        $mainTypeOfAlcohol = MainTypeAlcohol::get();
        $amountOfAlcoholDrinking = AmountOfAlcoholDrinking::get();
        $disease = Disease::get();
        $allergicDisease = AllergicDisease::get();
        $relationship = RelationshipType::get();
        $recordList = Record::select("record.*","family_members.relationship_type_id")
                            ->join("family_members","family_members.id","record.family_member_id")
                            ->where("family_members.customer_id",auth()->guard('customer')->user()->id)
                            ->get();
        $vaccinationRecordList = VaccinationRecord::select("vaccination_record.*","family_members.relationship_type_id")
                                                    ->join("family_members","family_members.id","vaccination_record.family_member_id")
                                                    ->where("family_members.customer_id",auth()->guard('customer')->user()->id)
                                                    ->get();
        $healthRecordList = HealthRecord::select("health_record.*","family_members.relationship_type_id")
                                        ->join("family_members","family_members.id","health_record.family_member_id")
                                        ->where("family_members.customer_id",auth()->guard('customer')->user()->id)
                                        ->get();
        $seo=SeoPage::where("title","health_record")->first();
        $data = [
            'personalInfo' => $personalInfo,
            'familyMembers' =>$familyMembers,
            "vaccinationList"=>$vaccinationList,
            "ageGroupList"=>$ageGroupList,
            "bloodType"=>$bloodType,
            "maritalStatus"=>$maritalStatus,
            "mainTypeOfAlcohol"=>$mainTypeOfAlcohol,
            "amountOfAlcoholDrinking"=>$amountOfAlcoholDrinking,
            "disease"=>$disease,
            "allergicDisease"=>$allergicDisease,
            "relationship" => $relationship,
            "recordList" =>$recordList,
            "vaccinationRecordList"=>$vaccinationRecordList,
            "healthRecordList"=>$healthRecordList,
            'seo'=>$seo
        ];
        return view('frontend.customer.myacc-healthprofile',$data);
    }

    public function getRecordInfo(Request $request) {
        $recordList = Record::select("record.*","family_members.relationship_type_id")
                        ->join("family_members","family_members.id","record.family_member_id")
                        ->where("family_members.id",$request->family_member_id)
                        ->where("record.report_type",$request->report_type)
                        ->get();
        return response()->json(['status' => 'success',"data"=>$recordList]);
    }

    public function recordFileUpload(Request $request) {
        //\Log::debug($request);
        $request->validate([
            'file' => 'mimes:pdf|max:20480|required_if:record_id,!=,0',
            'report_name' => 'required',
        ],[
            // 'file.required_if' => 'File need to choose',
            //'file.mimes' => 'File type must be pdf',
            'file.max' => 'File must not be greater than 20MB',
            //'report_name.required' => 'Report name is required',
        ]);
        if($request->record_id != 0) {
            $recordInfo = Record::find($request->record_id);
        }else{
            $recordInfo = new Record();
        }
        $recordInfo->report_name = $request->report_name;
        $recordInfo->report_date = $request->report_date!=null?date("Y-m-d",strtotime(str_replace('/', '-', $request->report_date))):date("Y-m-d");
        $recordInfo->report_type = $request->report_type;
        $recordInfo->remarks = $request->remarks ?? '-';
        $recordInfo->family_member_id = $request->family_member_id;
        if(isset($request->file)) {
            if($request->record_id != 0) {
                if($recordInfo->file != null) {
                    if(File::exists(public_path('storage/healthrecord').'/'.$recordInfo->file)) {
                        unlink(public_path('storage/healthrecord').'/'.$recordInfo->file);
                    }
                }
            }
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('storage/healthrecord'), $fileName);
            $recordInfo->file = $fileName;
        }
        $recordInfo->save();
        $recordList = Record::select("record.*","family_members.relationship_type_id")
        ->join("family_members","family_members.id","record.family_member_id")
        ->where("family_members.customer_id",auth()->guard('customer')->user()->id)
        ->get();
        return response()->json(['status' => 'success','data'=>$recordList]);
    }

    public function deleteRecordInfo(Request $request) {
        \Log::debug($request);
        $recordInfo = Record::where("id", $request->record_id)->first();
        if($recordInfo) {
            $recordInfo->delete();
        }
        $recordList = Record::select("record.*","family_members.relationship_type_id")
        ->join("family_members","family_members.id","record.family_member_id")
        ->where("family_members.customer_id",auth()->guard('customer')->user()->id)
        ->get();
        return response()->json(['status' => 'success','data'=>$recordList]);
    }


    public function customerMailActivation(Request $request, $activation_code)
    {
        $customer = Customer::where('activation_code', $activation_code)->first();
        $defaultLang = lang();
        if($customer){
            if($customer->email_is_verified == 0) {
                $customer->update([
                    'email_is_verified' => 1,
                    'activation_code' =>null,
                ]);
                createFmailyMemberMyself($customer);
                Auth::guard('customer')->login($customer);
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
                $data = [
                    'email' => $customer->email,
                    'name' => $customer->first_name,
                    'created_at' => $customer->created_at,
                    'coupons' => $coupons,
                    'welcome_reg' => 'welcome_reg',
                    'welcome_img' => $couponBanner->welcome_img,
                ];
                Mail::to($data['email'])->locale($defaultLang)->send(new GeneralMail($data));
                // $msg = 'Your email has been successfully verified';  
                return redirect()->to(route('mediq'))->with('reg_success_msg', 'Your email has been successfully verified');
            }
            return redirect()->to(route('mediq'));
        }else{
            return abort(404);
        }
    }
    public function subscribe()
    {
        $customerNotiSms = CustomerNotification::where("customer_id",\Auth::guard('customer')->user()->id)
        ->where("custom_notification_id",1)
        ->where("notification_type_id",1)
        ->first();
       
        if(!$customerNotiSms) {
            $emailSmsNotiOn = new CustomerNotification();
            $emailSmsNotiOn->customer_id = \Auth::guard('customer')->user()->id;
            $emailSmsNotiOn->custom_notification_id = 1;
            $emailSmsNotiOn->notification_type_id = 1;
            $emailSmsNotiOn->save();
        }
        $customerNotiEmail = CustomerNotification::where("customer_id",\Auth::guard('customer')->user()->id)
                                                ->where("custom_notification_id",1)
                                                ->where("notification_type_id",2)
                                                ->first();
        if(!$customerNotiEmail) {
            $emailSmsNotiOn = new CustomerNotification();
            $emailSmsNotiOn->customer_id = \Auth::guard('customer')->user()->id;
            $emailSmsNotiOn->custom_notification_id = 1;
            $emailSmsNotiOn->notification_type_id = 2;
            $emailSmsNotiOn->save();
        }
        return response()->json(["status" => "ok"]);
    }

    public function mobileProfile()
    {
        return view('frontend.customer.mobile-menu');
    }


}
