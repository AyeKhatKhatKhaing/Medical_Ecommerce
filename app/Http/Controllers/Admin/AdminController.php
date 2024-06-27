<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User as Merchant;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use AkkiIo\LaravelGoogleAnalytics\Period;
use Google\Analytics\Data\V1beta\MetricAggregation;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;
use Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation;
use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $page = "Dashboard";
        $topPerformingPage = LaravelGoogleAnalytics::getTotalViewsByPageAndUser(Period::months(1), 20); 
        $totalUserOneDay = LaravelGoogleAnalytics::getTotalUsers(Period::days(1));
        $totalUserByDay = LaravelGoogleAnalytics::getTotalUsers(Period::days(7));
        $totalPageByDay = LaravelGoogleAnalytics::getTotalViews(Period::days(7));
        $averageBrowser = LaravelGoogleAnalytics::getAverageSessionDuration(Period::years(1));
        $userByDateYear = LaravelGoogleAnalytics::getTotalUsersByDate(Period::years(1));
        $userByDateMonth = LaravelGoogleAnalytics::getTotalUsersByDate(Period::months(1));
        $userByDate = LaravelGoogleAnalytics::getTotalUsersByDate(Period::days(7));
        $userMostVisitCountry = LaravelGoogleAnalytics::getMostUsersByCountry(Period::months(1));
        $userMostVisitCountryMap = collect($userMostVisitCountry)->pluck('countryId');

        $userDate=[];
        $usertotal=[];
        $usertotalmonth=[];
        $usertotalyear=[];

        $userDateYear =[];
        foreach($userByDateYear as $d){
            $userDateYear[] = Carbon::createFromFormat('Ymd', $d['date'])->format('Y');
            $usertotalyear[] = $d['totalUsers'];
        }

        $userDateMonth = [];
        foreach($userByDateMonth as $d){
            $userDateMonth[] = Carbon::createFromFormat('Ymd', $d['date'])->format('d M');
            $usertotalmonth[] = $d['totalUsers'];
        }
        foreach($userByDate as $d){
            $userDate[] = Carbon::createFromFormat('Ymd', $d['date'])->format('D');
            $usertotal[] = $d['totalUsers'];
        }
        $userByDate = LaravelGoogleAnalytics::getTotalViewsByDate(Period::days(7));
        $pageDate=[];
        $pageTotal=[];
        foreach($userByDate as $d){
            $pageDate[] = Carbon::createFromFormat('Ymd', $d['date'])->format('D');
            $pageTotal[] = $d['screenPageViews'];
        }
        $device = LaravelGoogleAnalytics::dateRanges(Period::years(1))
        ->metrics('totalUsers')
        ->dimensions('deviceCategory')
        ->metricAggregations(MetricAggregation::TOTAL)
        ->get();
        $deviceName=[];
        $userCount=[];
        $colourCode = [];
        foreach($device->table as $dev){
            $code = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            $deviceName[] = $dev['deviceCategory'];
            $userCount[] = (int)$dev['totalUsers'];
            $colourCode[]='#'.$code;
        }
        $deviceUserTotal=0;
        foreach($device->metricAggregationsTable as $dev){
            $deviceUserTotal = $dev['totalUsers'];
        }
        return view('admin.dashboard',compact('page','topPerformingPage','totalUserOneDay','totalUserByDay','totalPageByDay','averageBrowser','userDate','usertotal','pageDate','pageTotal','deviceName','userCount','deviceUserTotal','colourCode','usertotalmonth','usertotalyear','userDateMonth','userDateYear','userMostVisitCountry','userMostVisitCountryMap'));
        // return view('admin.dashboard',compact('page'));
    }

    public function login()
    {
        if (!Auth::check()) {
            return view('admin.auth.login');
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    public function loginValidate(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email'   => 'required|email',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'

        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = array(
                'status' => 'fail',
                'msg'    => 'Please check reCAPTCH box.',
            );
            return view('admin.auth.login',compact('error'));
        }
        else {
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {

                    return redirect()->route('dashboard');

            }else{
                $error = array(
                    'status' => 'fail',
                    'msg'    => 'Invalid Email or Password'
                );
                return view('admin.auth.login',compact('error'));
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        // Session::flush();
        return redirect()->route('letadminin');
    }

    public function upload(Request $request)
    {

        $file     = $request->file('file');

        $path     = url('storage/files/shares/uploads/').'/'.$file->getClientOriginalName();

        $imgpath  = $file->move(public_path('storage/files/shares/uploads/'),$file->getClientOriginalName());

        return response()->json(['location' => '/storage/files/shares/uploads/'.$file->getClientOriginalName()]);

    }

    public function productCate(Request $request)
    {
        $categories = SubCategory::whereIn('category_id',$request['category_id'])->get();
        $excates = [];
        if(isset($request['subCateEdit'])){
            $excates = SubCategory::whereNotIn('id',$request['subCateEdit'])->whereIn('category_id',$request['category_id'])->get();
        }
        $products = Product::whereIn('category_id',$request['category_id']);
        if($request['merchant_id'] != null){
            $products = $products->where('merchant_id',$request->merchant_id);
        }
        $products = $products->get();
        return response()->json([
            'categories' => $categories,
            'products' => $products,
            'excates' => $excates,
        ]);
    }

    public function productSubCate(Request $request)
    {
        $categories = [];
        if(isset($request['category_id'])){
            $categories = SubCategory::whereIn('category_id',$request['category_id'])->whereNotIn('id',$request['product_cate'])->get();
        }else{
            $categories = SubCategory::whereNotIn('id',$request['product_cate'])->get();
        }
        // $proCates = ProductSubCategory::whereIn('sub_category_id',$request['product_cate'])->pluck('product_id')->toArray();
        $products = Product::whereIn('sub_category_id',$request['product_cate']);
        if($request['merchant_id'] != null){
            $products = $products->where('merchant_id',$request->merchant_id);
        }
        $products = $products->get();
        // $exproducts =[];
        // if(isset($request['pro'])){
        //     $exproducts = Product::whereNotIn('id',$request['pro'])->whereIn('id',$proCates)->get();
        // }
        return response()->json([
            'products' => $products,
            'categories' => $categories,
            // 'exproducts' => $exproducts
        ]);
    }

    public function merchantData(Request $request)
    {
        // if(isset($request['exMerchantIds'])){
        //     $exc_merchants = Merchant::where('is_merchant', true)->whereNotIn('id',$request['exMerchantIds'])->get();
        // }else{
        //     $exc_merchants = Merchant::where('is_merchant', true)->whereNotIn('id',$request['merchant_id'])->get();
        // }
        $ex_products = [];
        if(isset($request['product_cate']) && count($request['product_cate']) > 0){
            $cate_ids = SubCategory::whereIn('id',$request['product_cate'])->pluck('category_id')->toArray();
            $products = Product::whereIn('merchant_id',$request['merchant_id'])->whereIn('category_id',$cate_ids)->get();
        }elseif(isset($request['subCateEdit'])){
            $cate_ids = SubCategory::whereIn('id',$request['subCateEdit'])->pluck('category_id')->toArray();
            $products = Product::where('merchant_id',$request['merchantIds'])->whereIn('category_id',$cate_ids)->get();
            $ex_products = Product::whereNotIn('id',$request['productIds'])->where('merchant_id',$request['merchantIds'])->whereIn('category_id',$cate_ids)->get();
        }else{
            $products = Product::where('merchant_id',$request['merchant_id'])->get();
        }
        return response()->json([
            'products' => $products,
            // 'exc_merchants' => $exc_merchants,
            'ex_products' => $ex_products,
        ]);
    }

    public function productData(Request $request)
    {
        $exProducts = Product::where('is_published',true);
        if($request['merchant_id'] != null){
            $exProducts = $exProducts->where('merchant_id',$request['merchant_id']);
        }
        if($request['category_id'] != null && count($request['category_id']) > 0){
            $exProducts = $exProducts->whereIn('category_id',$request['category_id']);
        }
        if($request['product_cate'] != null && count($request['product_cate']) > 0){
            $exProducts = $exProducts->whereIn('sub_category_id',$request['product_cate']);
        }
        $exProducts = $exProducts->whereNotIn('id',$request['product_ids'])->get();
        $ex_pro_ids = $exProducts->pluck('id');
        // $recomProducts = Product::whereIn('id',$request['product_ids'])->whereNotIn('id',$ex_pro_ids)->get();
        return response()->json([
            'exProducts' => $exProducts,
            // 'recomProducts' => $recomProducts,
        ]);
    }
}
