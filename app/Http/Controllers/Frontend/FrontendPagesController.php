<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Home;
use App\Models\Page;
use App\Models\User;
use App\Models\About;
use App\Models\Coupon;
use App\Models\OnSale;
use App\Models\Slider;
use App\Models\Carrier;
use App\Models\Contact;
use App\Models\Empower;
use App\Models\FaqPage;
use App\Models\Package;
use App\Models\Product;
use App\Models\SeoPage;
use App\Models\BankInfo;
use App\Models\Category;
use App\Models\PriceTag;
use App\Models\AddOnItem;
use App\Models\BestPrice;
use App\Models\ContactUs;
use App\Models\PromoCode;
use App\Models\Recipient;
use App\Models\KeyItemTag;
use App\Models\OfficeInfo;
use App\Models\CarrierPage;
use App\Models\ChooseMediq;
use App\Models\FaqCategory;
use App\Models\Partnership;
use App\Models\PlanProcess;
use App\Models\SubCategory;
use App\Models\TimeSlotTag;
use App\Models\BlogCategory;
use App\Models\CheckUpGroup;
use App\Models\HighlightTag;
use App\Models\SaleCategory;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\CouponProduct;
use App\Models\MilestoneYear;
use App\Models\RecipientItem;
use App\Models\Supplementary;
use Illuminate\Http\Response;
use Laravel\Ui\Presets\React;
use App\Models\BookingProcess;
use App\Models\CheckTableItem;
use App\Models\ProductEnquiry;
use App\Models\QuickStartPage;
use App\Models\BestPriceDetail;
use App\Models\ContactCustomer;
use App\Models\MilestoneDetail;
use App\Models\PartnershipHelp;
use App\Models\PlanDescription;
use App\Models\QuickStartGuide;
use App\Models\ServiceSolution;
use App\Models\CheckUpTableType;
use App\Models\ProductVariation;
use App\Models\User as Merchant;
use App\Models\OptionDecideLater;
use App\Models\PartnershipDetail;
use App\Models\PromotionCampaign;
use App\Models\BookingProcessPage;
use App\Models\ProductEnquiryForm;
use App\Models\ProductSubCategory;
use App\Models\ProductTimeSlotTag;
use App\Models\RecipientAddOnItem;
use Illuminate\Support\Facades\DB;
use App\Models\ProductHighlightTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Cookie;
use App\Models\RecentlyComparedProduct;
use App\Http\Requests\ContactCustomerRequest;

class FrontendPagesController extends Controller
{
    public function index()
    {
        $home = Home::whereIsPublished(true)->first();
        $main_categories = Category::whereIsPublished(true)->get();
        $subCategories = SubCategory::with('products')->select('id', 'name_en', 'name_tc', 'name_sc', 'img')
            ->whereIsPublished(true)->whereIsHome(true)->orderBy('sort_by','asc')->get();
        $date = Carbon::now();
        $bundles = Coupon::where('is_bundle', true)
                        ->whereIsPublished(true)
                        ->whereDate('coupons.start_date', '<=', $date->format('Y-m-d H:i:s'))
                        ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d H:i:s'))
                        ->whereNotNull("merchant_id")
                        ->get();
        $unique_merchant = $bundles->pluck('merchant_id')->unique();
        $coupons = Coupon::where('is_bundle', false)
                            ->where('owner_type',1)
                            ->whereIsPublished(true)
                            ->whereDate('coupons.start_date', '<=', $date->format('Y-m-d H:i:s'))
                            ->whereDate('coupons.end_date', '>=', $date->format('Y-m-d H:i:s'))
                            ->get();

        $chooseMedia = ChooseMediq::first();
        $promotionCampaign = PromotionCampaign::where('id', 1)->whereIsPublished(true)->first();
        $product_ids = isset($promotionCampaign->product_ids) ? json_decode($promotionCampaign->product_ids) : [];
        $promoProducts = Product::whereIn('id', $product_ids)->get();
        $sliders = Slider::whereIsPublished(true)->orderBy('sort_order', 'asc')->get();
        $blogs = Blog::whereIsPublished(true)->get();
        $saleCategories = SaleCategory::whereIsPublished(true)->get();
        $service_solutions = ServiceSolution::where('is_published',true)->get();
        $promoCodes = PromoCode::whereIsPublished(true)->whereDate('start_date', '<=', $date->format('Y-m-d'))
            ->whereDate('end_date', '>=', $date->format('Y-m-d'))->get();
        $seo = SeoPage::where("title","home_page")->first(); 
        return view('frontend.home.index', compact('bundles', 'unique_merchant', 'promoCodes', 'home', 'subCategories', 'main_categories', 'coupons', 'chooseMedia', 'promotionCampaign', 'promoProducts', 'sliders', 'blogs', 'service_solutions','seo'));
    }

    public function arrayStrToInt($sales, $values)
    {
        foreach ($sales as $key => $sale) {
            $removeArr = trim($sale, '[]');
            $converToStr = trim($removeArr, '"');
            $values[$key] = $converToStr;
        }
        return $values;
    }

    public function collectCoupon(Request $request)
    {
        if(!Auth::guard('customer')->check()){
            abort(404);
        }
        $customer_id = Auth::guard('customer')->user()->id;
        $collet_coupons = [];
        if ($request['all_check'] != null) {
            $coupon_ids = Coupon::whereIsPublished(true)->where('merchant_id', $request['merchant_id'])->pluck('id')->toArray();
            // $collet_coupons = CouponCollect::where('customer_id', $customer_id)->whereNotIn('coupon_id', $coupon_ids)->get();
            foreach ($coupon_ids as $coupon) {
                $collect_coupon_id = CouponCollect::where('customer_id', $customer_id)->where('coupon_id', $coupon)->first();
                if ($collect_coupon_id == null) {
                    CouponCollect::create([
                        'customer_id' => $customer_id,
                        'coupon_id' => $coupon,
                        'bundle_coupon_id' => $request['coupon_id'],
                    ]);
                }
            }
        } else {
            $requestData = $request->all();
            $requestData['customer_id'] = $customer_id;
            CouponCollect::create($requestData);
        }

        return response()->json([
            'coupon_id' => $request->coupon_id,
            'collet_coupons' => $collet_coupons,
        ]);
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $total_qty = 0;
        $total_price = 0;
        $all_carts = [];
        $cart = [];
        if (Auth::guard('customer')->check()) {

            $customer_id = Auth::guard('customer')->user()->id;
            $product = Product::where('id', $request['product_id'])->first();
            if(isset($product->productsVariations) && count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
                $vproduct = getLowestPrice($product);
            }else{
                $vproduct = null;
            }
            // dd($vproduct);
            if ($request['product_id'] != null) {
                $cart = Cart::where('customer_id', $customer_id)->where('product_id', $request['product_id'])->first();
                if ($cart != null) {
                    $cart->update([
                        'price' => $cart->price += isset($vproduct) ? $this->getProductPrice($vproduct) : $this->getProductPrice($product),
                        'qty' => $cart->qty += 1
                    ]);
                } else {
                    $cart = Cart::create([
                        'customer_id' => $customer_id,
                        'product_id' => $product->id,
                        'package_id' => $product->package->id,
                        'qty' => 1,
                        'price' => isset($vproduct) ? $this->getProductPrice($vproduct) : $this->getProductPrice($product)
                    ]);
                }
                if ($product->is_two_recipient == true) {
                    foreach (['recipient1', 'recipient2'] as $key => $item) {
                        if($key == 1){
                            $each_recipient_amount = null;
                         }else{
                             $each_recipient_amount = isset($vproduct) ? $this->getProductPrice($vproduct) : $this->getProductPrice($product);
                         }
                        $recipient = Recipient::create([
                            'customer_id' => $customer_id,
                            'product_id' => $product->id,
                            'cart_id' => $cart->id,
                            'variable_id' => isset($vproduct) ? $vproduct->id : null,
                            'each_recipient_amount' => $each_recipient_amount
                        ]);
                    }
                } else {
                    $recipient = Recipient::create([
                        'customer_id' => $customer_id,
                        'product_id' => $product->id,
                        'cart_id' => $cart->id,
                        'variable_id' => isset($vproduct) ? $vproduct->id : null,
                        'each_recipient_amount' => isset($vproduct) ? $this->getProductPrice($vproduct) : $this->getProductPrice($product)
                    ]);
                }
            }
            $cart = Cart::with('product')->where('customer_id', $customer_id)->get();
            $total_qty = $cart->sum('qty');
            // $total_price = $cart->sum('sub_total');
            $total_price = $cart->sum('price');
        }
        return response()->json([
            'cart' => $total_qty,
            'all_carts' =>  $cart,
            'total_price' => $total_price,
        ]);
    }

    public function removeCart(Request $request)
    {
        if(!Auth::guard('customer')->check()){
            abort(404);
        }
        $customer_id = Auth::guard('customer')->user()->id;
        $product = Product::select('products.*')->where('id', $request['product_id'])->first();
        if(isset($product)){
            $cart = Cart::with('product')->where('product_id',$request['product_id'])->where('customer_id', $customer_id)->first();
        }
        // else{
        //     return response()->json([
        //         'error' => 'product not found!',
        //     ]);
        // }
        // if($cart == null){
        //     return response()->json([
        //         'error' => 'product not found!',
        //     ]);
        // }
        if($cart != null && $product != null){

            $recipient = Recipient::select('recipients.*')
            ->join('products','recipients.product_id','=','products.id')
            ->where('recipients.product_id',$product->id)
            ->where('recipients.customer_id',$customer_id)
            ->where('recipients.is_ordered_checkout',false)
            ->where('recipients.cart_id',$cart->id);
            $isRecipient = $recipient->first();
            if(!$isRecipient){
                return response()->json([
                    'error' => 'product not found!',
                ]);
            }
            if($product->is_two_recipient == true) {
                $getRecipient = $recipient->first();
                $addOnPrice = isset($getRecipient->add_on_prices) ? $getRecipient->add_on_prices : 0;
                $recipientPrice = isset($getRecipient->each_recipient_amount) ? $getRecipient->each_recipient_amount : 0;
                $price = $recipientPrice + $addOnPrice;
                if($cart != null){
                    $cart->update([
                        'price' => $cart->price - $price,
                        'qty' => $cart->qty -= 1
                    ]);
                }
                $recipient =$recipient->where('products.is_two_recipient',true)->take(2)->get();
                foreach($recipient as $r){
                    $r->delete();
                }
            }else{
                $getRecipient = $recipient->first();
                $addOnPrice = isset($getRecipient->add_on_prices) ? $getRecipient->add_on_prices : 0;
                $recipientPrice = isset($getRecipient->each_recipient_amount) ? $getRecipient->each_recipient_amount : 0;
                $price = $recipientPrice + $addOnPrice;
                
                // if($cart != null){
                    $cart->update([
                        'price' => $cart->price - $price,
                        'qty' => $cart->qty -= 1
                    ]);
                // }
                $recipient = $recipient->where('products.is_two_recipient',false)->first();
                if($recipient != null){
                    $recipient->delete();
                }
            }
            if($cart->qty == 0){
                Cart::where('id',$cart->id)->delete();
            }
        }

        $carts = Cart::with('product')->where('customer_id', $customer_id)->get();
        $total_qty = $carts->sum('qty');
        $total_price = $carts->sum('price');
        return response()->json([
            'cart' => $total_qty,
            'all_carts' =>  $carts,
            'total_price' => $total_price,
        ]);
    }

    public function searchKeyword(Request $request)
    {

        $keyword = $request->keyword;

        $categories = Product::join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->select('products.*')
            ->where('products.name_en', 'LIKE', '%' . $keyword . '%')
            ->orWhere('products.original_price', 'LIKE', '%' . $keyword . '%')
            ->orWhere('products.slug_en', 'LIKE', '%' . $keyword . '%')
            ->orWhere('sub_categories.name_en', 'LIKE', '%' . $keyword . '%')
            ->get();

        $brands = Product::join('users', 'products.merchant_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.is_merchant', true)
            ->orWhere('users.name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('users.email', 'LIKE', '%' . $keyword . '%')
            ->get();


        if ($keyword != null) {
            $data = [
                "is_searched" => true,
                "searched_products" => [],
                "searched_categories" => $categories,
                "searched_brands" => $brands
            ];
        } else {
            $data = [
                "is_searched" => false,
                "searched_products" => [],
                "searched_categories" => [],
                "searched_brands" => []
            ];
        }
        return view('frontend.include.searched', $data)->render();
    }

    public function productDetail(Request $request,$category, $slug)
    {
        $product = Product::where('slug_en', $slug)->whereIsPublished(true)->firstOrFail();
        if($product){
            $product->view_count = $product->view_count + 1;
            $product->update();
        }
        $checkuptable =  $product->package ? $product->package->checkupTable : null;
        $groups = [];
        $checkupTypes = [];
        $tablePriIds = [];
        $tableGroups = [];
        $optionGroups = [];
        if ($checkuptable != null) {

            $tablePriIds = CheckUpTableType::where('check_up_table_id', $checkuptable->id)->pluck('id')->toArray();
            $optionGroupIds = CheckTableItem::whereIn('check_up_table_type_id', $tablePriIds)->pluck('check_up_group_id')->toArray();
            $optionGroups = CheckUpGroup::whereIn('id', $optionGroupIds)->get();

            $tableGroupIds =  CheckUpTableType::where('check_up_table_id', $checkuptable->id)
                ->where('check_up_type_id', 1)->pluck('check_up_group_id')->toArray();

            $tableGroups = CheckUpGroup::whereIn('id', $tableGroupIds)->get();

            $checkupTypes = $product->package->checkupTable->check_up_type_val;
        }

        $timeSlots = TimeSlotTag::whereIn('id', $product->time_slot_tag_ids_arr)->get();

        // $addOnItems = AddOnItem::whereIsPublished(true)->where('merchant',$product->merchant_id)->get();


        $supplementaries = [];
        if (count($product->supplementary_ids_arr) > 0) {
            $supplyMentaryIds = $product->supplementary_ids_arr;
            $supplementaries = Supplementary::whereIn('id', $supplyMentaryIds)->get();
        }

        $galleries = [];
        $allImages = [];
        $countImgs = null;
        if (isset($product->merchant)) {
            $galleries = $product->merchant->galleries;
            if (count($galleries) > 0) {
                $common_area = collect($galleries[0]['common_area']);
                $services_facilities = collect($galleries[0]['services_facilities']);
                $other = collect($galleries[0]['other']);
                $countImgs = count($common_area) + count($services_facilities) + count($other);
                $allImages = $common_area->toBase()->merge($other)->merge($services_facilities);
            }
        }

        $product_galleries = [];
        $product_allImages = [];
        $product_countImgs = null;
        if (isset($product->productGallery)) {
            $product_galleries = $product->productGallery;
            if (count($product_galleries) > 0) {
                $common_area = collect($product_galleries[0]['common_area']);
                $feature_images = collect($product_galleries[0]['feature_images']);
                $services_facilities = collect($product_galleries[0]['services_facilities']);
                $other = collect($product_galleries[0]['other']);
                $product_countImgs = count($common_area) + count($services_facilities) + count($other);
                $product_allImages = $common_area->toBase()->merge($other)->merge($services_facilities);
            }
        }

      
        $planProcess = PlanProcess::where('id', $product->plan_process_id)->first();

        $planDescription = PlanDescription::where('id', $product->plan_description_id)->first();

        $relatedProducts = Product::whereIsPublished(true)->where('category_id', $product->category_id)->get();

        $date = Carbon::now();
        $promoCodes = PromoCode::whereIsPublished(true)->whereDate('start_date', '<=', $date->format('Y-m-d'))
            ->whereDate('end_date', '>=', $date->format('Y-m-d'))->get();
        $product_merchant = $product->merchant()
            ->with(['merchantLocations', 'merchantLocations.area', 'merchantLocations.weekDays', 'merchantLocations.events'])->get();

        if ($request->session()->has('recentlyViewedProducts')) {
            $request->session()->push('recentlyViewedProducts', $product->id);
        } else {
            $request->session()->put('recentlyViewedProducts', array($product->id));
        }
        $main_categories = Category::whereIsPublished(true)->get();
        $merchantLocations = $product->merchant->merchantLocations ?? [];
        $productLocations = $product->product_location_data ?? [];
        return view('frontend.product_details.index', compact(
            'product',
            'checkuptable',
            'tableGroups',
            'optionGroups',
            'checkupTypes',
            'tablePriIds',
            'promoCodes',
            'product_merchant',
            'timeSlots',
            'supplementaries',
            'planProcess',
            'planDescription',
            'galleries',
            'allImages',
            'countImgs',
            'product_galleries',
            'product_allImages',
            'product_countImgs',
            'relatedProducts',
            'merchantLocations',
            'productLocations'
        ));
    }

    public function bookNow(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        // if($request->product_type == 2){
        //     $cartExist = Cart::with('product')->where('customer_id', $customer_id)->exists();
        //     if($cartExist){
        //         return redirect()->back();
        //     }
        // }
        $input = $request->all();
        $recipt1 = $request['recipient-1'];
        $recipt2 = $request['recipient-2'];
        $recipt3 = $request['recipient-3'];
        $recipt4 = $request['recipient-4'];
        $recipt5 = $request['recipient-5'];
        $recipt_ids = array_values(array_filter(array($recipt1, $recipt2, $recipt3, $recipt4, $recipt5)));
        
        // dd( $request->all() );
        $product = Product::where('id', $request['product_id'])->first();
        if($product->product_type == 1){
            $cart = Cart::where('customer_id', $customer_id)->where('product_id', $request['product_id'])->first();
            if ($cart == null) {
                $cart = Cart::create([
                    'customer_id' => $customer_id,
                    'product_id' => $product->id,
                    'package_id' => $product->package->id,
                    // 'qty' => 1,
                    // 'price' => $totalPrice
                ]);
            }
        }
        if($product->product_type == 3){
            $date = Carbon::now()->format('ymd');
            $productEnquiry = ProductEnquiry::create([
                'enquiry_invoice_no' => 'e'.$date.random_int(10000, 99999),
                'customer_id' => $customer_id,
                'product_id' => $product->id,
            ]);
        }
        foreach ($recipt_ids as $key => $recipt) {
            $code = sprintf("%'.03d", $key+1).PHP_EOL;
            if($product->product_type == 3){
                ProductEnquiryForm::create([
                    'product_enquiry_id' => $productEnquiry->id,
                    'customer_id' => $customer_id,
                    'product_id' => $product->id,
                    'booking_id' => $productEnquiry->enquiry_invoice_no.'-'.$code,
                    'age_check' => $request['age_check-' . $key + 1] ?? 0,
                    'have_referral' => $request['have_referral-' . $key + 1] ?? 0,
                    'id_card' => $request['id_card-' . $key + 1] ,
                    'disease_check' => $request['disease_check-' . $key + 1] ?? 0,
                    'blood_test' => $request['blood_test-' . $key + 1] ?? 0,
                    'had_colonoscopy' => $request['had_colonoscopy-' . $key + 1] ?? 0,
                    'medical_insurance' => $request['medical_insurance-' . $key + 1] ?? 0,
                    'ehealth_registered' => $request['ehealth_registered-' . $key + 1] ?? 0,
                ]);
            }else{
                // if ($request['selectedDate-' . $key + 1] != null) {
                    $vproduct = null ;
                    if(isset($request['product-package-'. $key + 1])){
                        $vproduct = ProductVariation::where('id',$request['product-package-'. $key + 1])->first();
                    }
                    if($product->is_two_recipient == true){
                        if($key == 1){
                        $each_recipient_amount = null;
                        }else{
                            $each_recipient_amount = isset($vproduct) ? $this->getProductPrice($vproduct) : $request->each_recipient_amount;
                        }
                    }else{
                        $each_recipient_amount = isset($vproduct) ? $this->getProductPrice($vproduct) : $request->each_recipient_amount;
                    }

                    if ($request->hasFile('file_upload-'.$key + 1)) {
                        $cart = null ;
                        $input['image'] = $this->saveImage($request->file('file_upload-'.$key + 1),'product_8');
                    }else{
                        $input['image'] = null;
                    }
                    $recipient = Recipient::create([
                        'customer_id' => $customer_id,
                        'product_id' => $request['product_id'],
                        'variable_id' => isset($vproduct) ? $vproduct->id : null,
                        'location' => $request['merchant-area-' . $key + 1] ?? null,
                        'time' => $request['selected-bookingtime-' . $key + 1] ?? null,
                        'date' => $request['booking-date-' . $key + 1] ?? null,
                        'is_prefer_time_decide_later' => $request['preferred-time-decide-later-' . $key + 1] == 'on' ? true : false,
                        'each_recipient_amount' => $each_recipient_amount,
                        'cart_id' => $product->product_type != 2 && isset($cart) ? $cart->id : null,
                        'have_referral' => $request['have_referral-' . $key + 1] ?? null,
                        'file_upload' => $input['image'],
                        'message' => $request['message-' . $key + 1] ?? null,
                    ]);
                // }
                if ($request['check_up_item-' . $key + 1] != null) {
                    foreach ($request['check_up_item-' . $key + 1] as $ckey => $group) {
                        $item = explode(',', $group);
                        RecipientItem::create([
                            'recipient_id' => $recipient->id,
                            'product_id' => $request['product_id'],
                            'check_up_group_id' => $item[0],
                            'check_up_item_id' => $item[1],
                        ]);
                    }
                }
                if ($request['group_id-' . $key + 1] != null) {
                    foreach ($request['group_id-' . $key + 1] as $gkey => $item) {
                        OptionDecideLater::create([
                            'recipient_id' => $recipient->id,
                            'product_id' => $request['product_id'],
                            'group_id' => $item,
                            'is_decide_later' => isset($request['decide'.$item.'-'.$key + 1]) && $request['decide'.$item.'-'.$key + 1] == 'on' ? 1 : 0,
                        ]);
                    }
                }
                if ($request['addd_on_items-' . $key + 1] != null) {
                    foreach ($request['addd_on_items-' . $key + 1] as $akey => $item) {
                        $addonitem = AddOnItem::where('id', $item)->first();
                        $recipient = Recipient::find($recipient->id);
                        $price = $recipient->add_on_prices += $addonitem->discount_price ? $addonitem->discount_price : $addonitem->original_price;
                        $recipient->update(['add_on_prices' => $price]);
                        RecipientAddOnItem::create([
                            'recipient_id' => $recipient->id,
                            'product_id' => $request['product_id'],
                            'add_on_item_id' => $item,
                        ]);
                    }
                }
                if(isset($cart) && isset($recipient)){
                    $recipient = Recipient::where('id',$recipient->id)->first();
                    $totalPrice = $recipient->each_recipient_amount += $recipient->add_on_prices;
                    $isTwoPerPlan = $cart->product->is_two_recipient == 1 ? true : false;
                    if($isTwoPerPlan == true){
                        if($key == 0){
                            $cart->update([
                                'price' => $cart->price += $totalPrice,
                                'qty' => $cart->qty +=  1
                            ]);
                        }else{
                            $cart->update([
                                'price' => $cart->price += $recipient->add_on_prices,
                            ]);
                        }
                    }else{
                        $cart->update([
                            'price' => $cart->price += $totalPrice,
                            'qty' => $cart->qty +=  1
                        ]);
                    }
                }
            }
        }
        if($product->product_type == 2){
            return redirect(route('checkout.init'));
        }
        // if($request['is_add_to_cart_btn'] == 'yes'){
            $cart = Cart::with('product')->where('customer_id', $customer_id)->get();
            $total_qty = $cart->sum('qty');
            // $total_price = $cart->sum('sub_total');
            $total_price = $cart->sum('price');
            $is_add_to_cart_btn = $request['is_add_to_cart_btn'];
            $product_type = $product->product_type == 3 ? true : false;
            return response()->json([
                'cart' => $total_qty,
                'all_carts' =>  $cart,
                'total_price' => $total_price,
                'is_add_to_cart_btn' => $is_add_to_cart_btn,
                'product_type' => $product_type,
            ]);
        // }

        // if($request['is_add_to_cart_btn'] != 'yes'){
            // return redirect()->route('checkout.init');
        // }
    }

    public function productListings(Request $request)
    {
        // dd($request->ss);
        isset($request->pc) ?
            $selected_categories = array_map('intval', explode(',', $request->pc)) :
            $selected_categories =  [];

        isset($request->pb) ?
            $selected_merchants = array_map('intval', explode(',', $request->pb)) :
            $selected_merchants = [];

        isset($request->pt) ?
            $selected_price_tags = array_map('intval', explode(',', $request->pt)) :
            $selected_price_tags = [];
            
        isset($request->st) ?
            $selected_time_slot_tags = array_map('intval', explode(',', $request->st)) :
            $selected_time_slot_tags = [];

        isset($request->ht) ?
            $selected_product_highlight_tags = array_map('intval', explode(',', $request->ht)) :
            $selected_product_highlight_tags = [];

        isset($request->tf) ?
            $selected_tab_filter = $request->tf :
            $selected_tab_filter =  'recommend';

        //For Key Item
        isset($request->ki) ?
            $selected_key_items = array_map('intval', explode(',', $request->ki)) :
            $selected_key_items =  [];
        
        $request->session()->forget('selected_key_items');
        $request->session()->put('selected_key_items', $selected_key_items);

        $searchKeyWords = '';
        isset($request->searchkeywords) ?
            $searchKeyWords = $request->searchkeywords : '';
    
        $items = Product::select("*", DB::raw('CAST(discount_price AS UNSIGNED) as discountsprice'));
        $items = $items->whereIsPublished(true)->whereNull('deleted_at');
        count($selected_categories) > 0 ?
        $items = $items->whereIn('sub_category_id', $selected_categories) : '';

        if($request->ss != 1){
        count($selected_key_items) > 0 ?
            $items = $items->whereHas('keyItemTags',function($q) use($selected_key_items){
                $q->whereIn('key_item_tag_id',$selected_key_items);
            }) : '';
        count($selected_product_highlight_tags) > 0 ?
            $items = $items->whereHas('highlightTags',function($q) use($selected_product_highlight_tags){
                $q->whereIn('highlight_tag_id',$selected_product_highlight_tags);
            }) : '';
        }else{
            // if (count($selected_key_items) > 0) {
            // $items = $items->whereHas('keyItemTags', function ($q) use ($selected_key_items) {
            //     foreach ($selected_key_items as $key_item) {
            //         $q->where('key_item_tag_id', $key_item);
            //     }
            // });
            // }
            // if (count($selected_product_highlight_tags) > 0) {
            //     $items = $items->whereHas('highlightTags', function ($q) use ($selected_product_highlight_tags) {
            //         foreach ($selected_product_highlight_tags as $highlight_tag) {
            //             $q->where('highlight_tag_id', $highlight_tag);
            //         }
            //     });
            // }
            if (count($selected_key_items) > 0 || count($selected_product_highlight_tags) > 0) {
                $items = $items->where(function ($query) use ($selected_key_items, $selected_product_highlight_tags) {
                    if (count($selected_key_items) > 0) {
                        $query->whereHas('keyItemTags', function ($q) use ($selected_key_items) {
                            foreach ($selected_key_items as $key_item) {
                                $q->where('key_item_tag_id', $key_item);
                            }
                        });
                    }
            
                    if (count($selected_product_highlight_tags) > 0) {
                        $query->orWhereHas('highlightTags', function ($q) use ($selected_product_highlight_tags) {
                            foreach ($selected_product_highlight_tags as $highlight_tag) {
                                $q->where('highlight_tag_id', $highlight_tag);
                            }
                        });
                    }
                });
            }
        // dd($items->get());
        }
       

        count($selected_price_tags) > 0 ?
            $items = $items->whereHas('priceTags',function($q) use($selected_price_tags){
                $q->whereIn('price_tag_id',$selected_price_tags);
            }) : '';
        count($selected_time_slot_tags) > 0 ?
                $items = $items->whereHas('timeSlotTags',function($q) use($selected_time_slot_tags){
                $q->whereIn('time_slot_tag_id',$selected_time_slot_tags);
            }) : '';
        count($selected_merchants) > 0 ?
            $items = $items->whereIn('merchant_id', $selected_merchants) : '';
       

        if ($selected_tab_filter == "low-price") {
        $items = $items->orderByRaw('CAST(COALESCE(discount_price, original_price) AS UNSIGNED) ASC');
        }
        if ($selected_tab_filter == "recommend") {
            $items = $items->orderByRaw('-sort_by_for_recommend DESC');
            $items = $items->orderBy('view_count', 'DESC');
            $items = $items->orderByRaw('CAST(discount_price AS SIGNED) DESC');
        }
        if ($selected_tab_filter == "popular") {
            $items = $items->orderBy('book_count', 'DESC');
            $items = $items->orderBy('view_count', 'DESC');
            $items = $items->orderByRaw('CAST(discount_price AS SIGNED) DESC');
        }
        
        if (strlen($searchKeyWords) > 0) {
            $items = $items->where('name_en', 'LIKE', "%{$searchKeyWords}%")
                ->orWhere('name_sc', 'LIKE', "%{$searchKeyWords}%")
                ->orWhere('name_tc', 'LIKE', "%{$searchKeyWords}%");
        }
        $countFilters = collect($selected_price_tags)
        ->merge(collect($selected_time_slot_tags))
        ->merge(collect($selected_product_highlight_tags))
        ->merge(collect($selected_key_items));
        $itemIds = $items->pluck('id')->toArray();
        $items = $items->whereIsPublished(true)->paginate(16);
        
        $price_tags_side_bar = \DB::table('price_tags')
                    ->join('product_price_tags', function($join) use ($itemIds) {
                        $join->on('product_price_tags.price_tag_id', '=', 'price_tags.id')
                            ->whereIn('product_price_tags.product_id', $itemIds);
                    })
                    ->whereNull('price_tags.deleted_at')
                    ->where('price_tags.is_published', 1)
                    ->groupBy('price_tags.id', 'price_tags.name_en', 'price_tags.name_tc', 'price_tags.name_sc', 'price_tags.img')
                    ->select(
                        'price_tags.id',
                        'price_tags.name_en',
                        'price_tags.name_tc',
                        'price_tags.name_sc',
                        'price_tags.img',
                        \DB::raw('COALESCE(COUNT(product_price_tags.product_id), 0) as item_count')
                    )
                    ->get();

        $time_slot_tags_side_bar = \DB::table('time_slot_tags')
        ->join('product_time_slot_tags', function($join) use ($itemIds) {
            $join->on('product_time_slot_tags.time_slot_tag_id', '=', 'time_slot_tags.id')
                ->whereIn('product_time_slot_tags.product_id', $itemIds);
        })
        ->whereNull('time_slot_tags.deleted_at')
        ->where('time_slot_tags.is_published', 1)
        ->groupBy('time_slot_tags.id', 'time_slot_tags.name_en', 'time_slot_tags.name_tc', 'time_slot_tags.name_sc', 'time_slot_tags.img')
        ->select(
            'time_slot_tags.id',
            'time_slot_tags.name_en',
            'time_slot_tags.name_tc',
            'time_slot_tags.name_sc',
            'time_slot_tags.img',
            \DB::raw('COALESCE(COUNT(product_time_slot_tags.product_id), 0) as item_count')
        )
        ->get();
    
        $product_key_item_tags = \DB::table('key_item_tags')
            ->join('product_key_item_tags', function($join) use ($itemIds) {
                $join->on('product_key_item_tags.key_item_tag_id', '=', 'key_item_tags.id')
                    ->whereIn('product_key_item_tags.product_id', $itemIds);
            })
            ->whereNull('key_item_tags.deleted_at')
            ->where('key_item_tags.is_published', 1)
            ->groupBy('key_item_tags.id', 'key_item_tags.name_en', 'key_item_tags.name_tc', 'key_item_tags.name_sc', 'key_item_tags.img')
            ->select(
                'key_item_tags.id',
                'key_item_tags.name_en',
                'key_item_tags.name_tc',
                'key_item_tags.name_sc',
                'key_item_tags.img',
                \DB::raw('COALESCE(COUNT(product_key_item_tags.product_id), 0) as item_count')
            )
        ->get();

        $product_highlight_tags = \DB::table('highlight_tags')
        ->join('product_highlight_tags', function($join) use ($itemIds) {
            $join->on('product_highlight_tags.highlight_tag_id', '=', 'highlight_tags.id')
                ->whereIn('product_highlight_tags.product_id', $itemIds);
        })
        ->whereNull('highlight_tags.deleted_at')
        ->where('highlight_tags.is_published', 1)
        ->groupBy('highlight_tags.id', 'highlight_tags.name_en', 'highlight_tags.name_tc', 'highlight_tags.name_sc', 'highlight_tags.img')
        ->select(
            'highlight_tags.id',
            'highlight_tags.name_en',
            'highlight_tags.name_tc',
            'highlight_tags.name_sc',
            'highlight_tags.img',
            \DB::raw('COALESCE(COUNT(product_highlight_tags.product_id), 0) as item_count')
        )
        ->get();

        $banner = Page::where('id',2)->first();
        $seo = SeoPage::where('title','product_list')->first();
        $request->session()->put('products', array($items));
        $request->session()->forget('products_count');
        $request->session()->put('products_count', $items->total());

        $request->session()->forget('products');
        $request->session()->put('products', $items);
        
        //dd($request->session()->get('products'));
        $data = [
            'products' => $items,
            'main_categories' => Category::whereIsPublished(true)->get(),
            'brands' => Merchant::where('is_merchant', true)->get(),
            'price_tags' =>  $price_tags_side_bar,
            // 'time_slot_tags' => TimeSlotTag::whereIn('id',$ptimeId)->whereNull('deleted_at')->whereIsPublished(true)->get(),
            // 'product_highlight_tags' => HighlightTag::whereNull('deleted_at')->whereIsPublished(true)->get(),
            'product_highlight_tags' => $product_highlight_tags,
            'product_key_item_tags' => $product_key_item_tags,
            'check_up_groups' => CheckUpGroup::whereNull('deleted_at')->whereIsPublished(true)->get(),
            'selected_categories' => $selected_categories,
            'selected_merchants' => $selected_merchants,
            'selected_price_tags' => $selected_price_tags,
            'selected_time_slot_tags' => $selected_time_slot_tags,
            'selected_product_highlight_tags' => $selected_product_highlight_tags,
            'selected_tab_filter' => $selected_tab_filter,
            'selected_key_items' => $selected_key_items,
            'countFilters' => $countFilters,
            'banner' => $banner,
            'seo' => $seo,
            'time_slot_tags_side_bar' =>  $time_slot_tags_side_bar,

        ];

       
        if ($request->ajax()) {
            $view1 = view('frontend.product_listings.product-filter', $data)->render();
            return $view1; 
            // return view('frontend.product_listings.product-list', $data)->render();
        } else {
            return view('frontend.product_listings.index', $data);
        }
    }


    public function productModal(Request $request){
        $product = Product::where('id',$request->productId)->first();
        return view('frontend.product-modal', compact('product'));
    }

    public function productList(Request $request){
        // if(Route::current()->getName()  == 'product.list'){
        //     abort(404);
        // }
        if ($request->ajax()) {
            $products = $request->session()->get('products');
            return view('frontend.product_listings.product-grid-view', compact('products'));
        }
        else{
            abort(404);
        }
    }

    public function productGrid(Request $request){
        if ($request->ajax()) {
        $products = $request->session()->get('products');
        return view('frontend.product_listings.product-list-view-card', compact('products'));
        }else{
            abort(404);
        }
    }

    public function countProducts(Request $request){
        $products = $request->session()->get('products_count');
        if ($request->ajax()) {
            return response()->json(['status' => 'ok', 'data' => $products]);
        }
    }

    public function brandCategory(Request $request){
        $products = $request->session()->get('products');
        $price_tags = $request->session()->get('price_tags');
        $selected_price_tags =  $request->session()->get('selected_price_tags');
        $selected_time_slot_tags =  $request->session()->get('selected_time_slot_tags');
        $time_slot_tags_side_bar =  $request->session()->get('time_slot_tags');
       // dd($time_slot_tags_side_bar);
        $selected_key_items =  $request->session()->get('selected_key_items');
        $product_key_item_tags =  $request->session()->get('key_item_tags');
        $selected_product_highlight_tags =  $request->session()->get('selected_product_highlight_tags');
        $product_highlight_tags =  $request->session()->get('hightlight_tags');
        $selected_tab_filter =  $request->session()->get('selected_tab_filter');
        $view1 = view('frontend.product_listings.category_brand',compact('products','price_tags','selected_price_tags','selected_time_slot_tags','time_slot_tags_side_bar','selected_key_items','product_highlight_tags','selected_product_highlight_tags','product_key_item_tags','selected_time_slot_tags','time_slot_tags_side_bar','selected_tab_filter'));
            return $view1; 
    }

    // public function sampleDateApi()
    // {
    //     $merchants = Merchant::with(['merchantLocations', 'merchantLocations.weekDays', 'merchantLocations.events'])->where('id', 16)->get();
    //     return response()->json([
    //         "merchants" => $merchants
    //     ]);
    // }

    public function searchAjax(Request $request)
    {
        $recentSearchKeywords = array();
        $query = $request->search;
        $products = array();
        $merchants = array();
        $categories = array();

        if ($request->session()->has('recentSearchKeywords')) {
            $recentSearchKeywords = $request->session()->get('recentSearchKeywords');
            $recentSearchKeywords = array_slice($recentSearchKeywords, -10);
        }
        if (strlen($query) == 0) {
            return view('frontend.include.ajaxsearch', compact('products', 'categories', 'recentSearchKeywords', 'merchants'));
        }
        
        $query = '%'.$query.'%';
        $categories = DB::select("
                        SELECT sub_categories.* 
                        FROM sub_categories 
                        WHERE (is_published=1) and (name_en LIKE ? or name_tc LIKE ? or name_sc LIKE ?) LIMIT 3
                    ",[$query,$query,$query]);
        $merchants = DB::select("
                        SELECT users.* 
                        FROM users 
                        WHERE (is_merchant=1 and is_published=1) and (name_en LIKE ? or name_tc LIKE ? or name_sc LIKE ?) LIMIT 3
                    ",[$query,$query,$query]);
      
        $products = DB::select("
                    SELECT products.*,categories.name_en as category_name_en
                    FROM products
                    JOIN categories ON categories.id=products.category_id
                    WHERE (products.is_published=1) and (products.name_en LIKE ? or products.name_tc LIKE ? or products.name_sc LIKE ?) LIMIT 3
        ",[$query,$query,$query]);

        if (sizeof($recentSearchKeywords) > 0 || sizeof($categories) > 0 || sizeof($merchants) > 0  || sizeof($products) > 0) {
            return view('frontend.include.ajaxsearch', compact('products', 'categories', 'recentSearchKeywords', 'merchants'));
        }
        // return 'No results found. Please try a different search.';
        return trans('labels.header.no_result');
    }

    public function searchAjaxMobile(Request $request)
    {
        $recentSearchKeywords = array();
        $query = $request->search;
        // dd($query);
        $products = array();
        $merchants = array();
        $categories = array();

        if ($request->session()->has('recentSearchKeywords')) {
            $recentSearchKeywords = $request->session()->get('recentSearchKeywords');
            $recentSearchKeywords = array_slice($recentSearchKeywords, -10);
        }
        
        if (strlen($query) == 0) {
            return view('frontend.include.ajaxsearchmobile', compact('products', 'categories', 'recentSearchKeywords', 'merchants'));
        }
            
        $query = '%'.$query.'%';
        $categories = DB::select("
                        SELECT sub_categories.* 
                        FROM sub_categories 
                        WHERE (is_published=1) and (name_en LIKE ? or name_tc LIKE ? or name_sc LIKE ?) LIMIT 3
                    ",[$query,$query,$query]);
        $merchants = DB::select("
                        SELECT users.* 
                        FROM users 
                        WHERE (is_merchant=1 and is_published=1) and (name_en LIKE ? or name_tc LIKE ? or name_sc LIKE ?) LIMIT 3
                    ",[$query,$query,$query]);
      
        $products = DB::select("
                    SELECT products.*,categories.name_en as category_name_en
                    FROM products
                    JOIN categories ON categories.id=products.category_id
                    WHERE (products.is_published=1) and (products.name_en LIKE ? or products.name_tc LIKE ? or products.name_sc LIKE ?) LIMIT 3
        ",[$query,$query,$query]);

        if (sizeof($recentSearchKeywords) > 0 || sizeof($categories) > 0 || sizeof($merchants) > 0  || sizeof($products) > 0) {
            return view('frontend.include.ajaxsearchmobile', compact('products', 'categories', 'recentSearchKeywords', 'merchants'));
        }
        // return 'No results found. Please try a different search.';
        return trans('labels.header.no_result');
    }

    public function search(Request $request)
    {
        $query = $request->search;
        if ($request->session()->has('recentSearchKeywords')) {
            $request->session()->push('recentSearchKeywords', $query);
        } else {
            $request->session()->put('recentSearchKeywords', array($query));
        }
        $product = Product::where('name_en', 'like', '%' . $query . '%')
            ->orwhere('name_tc', 'like', '%' . $query . '%')
            ->orwhere('name_sc', 'like', '%' . $query . '%')
            ->whereIsPublished(true)
            ->first();
        if ($product) {
            return response()->json(['status' => 'ok', 'data' => $product]);
        }
        return response()->json(['status' => 'no', 'message' => trans('labels.header.no_result')]);
    }

    public function search_products(Request $request ){
        $query = $request->keyword;
        $categories = SubCategory::where('name_en', 'like', '%' . $query . '%')
        ->orwhere('name_tc', 'like', '%' . $query . '%')
        ->orwhere('name_sc', 'like', '%' . $query . '%')
        ->whereIsPublished(true)
        ->get()
        ->take(3);
        $merchants = User::where('name_en', 'like', '%' . $query . '%')
            ->orwhere('name_tc', 'like', '%' . $query . '%')
            ->orwhere('name_sc', 'like', '%' . $query . '%')
            ->whereIsMerchant(true)
            ->get()
            ->take(3);
        $products = Product::where('name_en', 'like', '%' . $query . '%')
            ->orwhere('name_tc', 'like', '%' . $query . '%')
            ->orwhere('name_sc', 'like', '%' . $query . '%')
            ->whereIsPublished(true)
            ->get()
            ->take(3);
        $data = ['product' => $products, 'merchants' => $merchants , 'categories' => $categories ];
        return response()->json(['data' => $data]);
    }

    public function searchRemove(Request $request)
    {
        $query = $request->search;
        $recentSearchKeywords = $request->session()->get('recentSearchKeywords');
        $searchQuery = array_search($query, $recentSearchKeywords);
        if ($searchQuery !== false) {
            unset($recentSearchKeywords[$searchQuery]);
        }
        $request->session()->forget('recentSearchKeywords');
        $request->session()->put('recentSearchKeywords', $recentSearchKeywords);
        return "ok";
    }

    public function compareProduct(Request $request)
    {
        // $request->session()->put('comparepage_session',true);
        $seo = SeoPage::where("title","product_compare_list")->first();
        $compareProductLists = array();
        if ($request->has("p1") && $request->p1 != null) {
            array_push($compareProductLists, (int)$request->p1);
        }
        if ($request->has("p2") && $request->p2 != null) {
            array_push($compareProductLists, (int)$request->p2);
        }
        if ($request->has("p3") && $request->p3 != null) {
            array_push($compareProductLists, (int)$request->p3);
        }
        if ($request->has("p4") && $request->p4 != null) {
            array_push($compareProductLists, (int)$request->p4);
        }

        if ($request->session()->has('compareProductItems')) {
            $request->session()->forget('compareProductItems');
            $request->session()->put('compareProductItems', $compareProductLists);
        } else {
            $request->session()->forget('compareProductItems');
            $request->session()->put('compareProductItems', $compareProductLists);
        }

        if (count($compareProductLists) == 0) {
            $replyTitle = "You can compare more plans.";
            $selectedCategory  = Category::select("id", "name_en", "name_tc", "name_sc")->where("id", 1)->first();
           
            $data = [
                'selectedCategory' => $selectedCategory,
                'productList' => [],
                'productIdList' => [],
                'replyTitle' => $replyTitle,
                'subCategories' => [],
                'seo'=>$seo
            ];

            if ($request->ajax()) {
                return view('frontend.product.compare-list', $data)->render();
            }
            return view("frontend.product.compare", $data);
        }

        $product  = Product::whereIn("id", $compareProductLists)
            ->whereIsPublished(true)
            ->pluck("category_id")
            ->toArray();
        if (count(array_unique($product)) != 1) {
            return "Product categories are not same.";
        }

        if (count($compareProductLists) != count($product)) {
            $replyTitle = "Products cannot be compared, please choose another product.";
            $lastestPublishedCompareProductList =  Product::whereIn("id", $compareProductLists)
                                                    ->whereIsPublished(true)
                                                    ->pluck("id")
                                                    ->toArray();
            $selectedCategory  = Category::select("id", "name_en", "name_tc", "name_sc")->where("id", 1)->first();
            if ($request->has("compare_page_redirect") && \Auth::guard('customer')->check()) {
                if ($request->has("compare_page_id")) {
                    $oldRecentlyCompareProduct = RecentlyComparedProduct::find($request->compare_page_id);
                    $oldRecentlyCompareProduct->product_id  = serialize($lastestPublishedCompareProductList);
                    $oldRecentlyCompareProduct->updated_at  = date("Y-m-d H:i:s");
                    $oldRecentlyCompareProduct->save();
                } else {
                    $recentlyCompareProduct = new RecentlyComparedProduct();
                    $recentlyCompareProduct->customer_id = \Auth::guard('customer')->user()->id;
                    $recentlyCompareProduct->product_id  = serialize($lastestPublishedCompareProductList);
                    $recentlyCompareProduct->save();
                }
            }
            // $data = [
            //     'selectedCategory' => $selectedCategory,
            //     'productList' => [],
            //     'productIdList' => [],
            //     'replyTitle' => $replyTitle,
            //     'subCategories' => []
            // ];
            $selectedCategory  = Category::select("id", "name_en", "name_tc", "name_sc")->where("id", $product[0])->first();

            $productList  = Product::select(
                "products.id",
                "products.featured_img",
                "products.original_price",
                "products.discount_price",
                "products.promotion_price",
                "products.name_en",
                "products.name_sc",
                "products.name_tc",
                "products.slug_en",
                "products.merchant_id",
                "products.number_of_dose",
                "products.check_up_package_id",
                "products.category_id",
                "users.icon"
            )
                ->join("categories","categories.id","products.category_id")
                ->join("users","users.id","products.merchant_id")
                ->whereIn("products.id", $lastestPublishedCompareProductList)
                ->where("products.is_published",1)
                ->with([
                    "merchant",
                    "recommendTags",
                    "highlightTags",
                    "category",
                    // "productCoupon" => function($q){
                    //     return $q->rightJoin('coupons', 'coupons.id', '=', 'coupon_products.coupon_id')
                    //     ->select('coupons.name_en',"coupon_products.coupon_id")
                    //     //->whereNull("coupons.coupon_type")
                    //     ->where("coupons.is_published",0);
                    //     // ->where("coupons.start_date",">=",date("Y-m-d H:i:s"))
                    //     // ->where("coupons.end_date","<=",date("Y-m-d H:i:s"))
                    //     //->get();
                    // },
                    "freeGift",
                    "package"
                ])
            ->get();
        $subCategories = SubCategory::select("id")->where("category_id",$selectedCategory->id)->pluck("id")->toArray();
        $data = [
            'selectedCategory' => $selectedCategory,
            'productList' => $productList,
            'productIdList' => $lastestPublishedCompareProductList,
            'subCategories' => $subCategories,
            'replyTitle' => $replyTitle,
            'seo'=>$seo
        ];
            if ($request->ajax()) {
                return view('frontend.product.compare-list', $data)->render();
            }
            return view("frontend.product.compare", $data);
        }

        if ($request->has("compare_page_redirect") && \Auth::guard('customer')->check()) {
            if ($request->has("compare_page_id")) {
                $oldRecentlyCompareProduct = RecentlyComparedProduct::find($request->compare_page_id);
                $oldRecentlyCompareProduct->product_id  = serialize($compareProductLists);
                $oldRecentlyCompareProduct->updated_at  = date("Y-m-d H:i:s");
                $oldRecentlyCompareProduct->save();
            } else {
                $recentlyCompareProduct = new RecentlyComparedProduct();
                $recentlyCompareProduct->customer_id = \Auth::guard('customer')->user()->id;
                $recentlyCompareProduct->product_id  = serialize($compareProductLists);
                $recentlyCompareProduct->save();
            }
        }

        $selectedCategory  = Category::select("id", "name_en", "name_tc", "name_sc")->where("id", $product[0])->first();

        $productList  = Product::select(
            "products.id",
            "products.featured_img",
            "products.original_price",
            "products.discount_price",
            "products.promotion_price",
            "products.name_en",
            "products.name_sc",
            "products.name_tc",
            "products.slug_en",
            "products.merchant_id",
            "products.number_of_dose",
            "products.check_up_package_id",
            "products.category_id",
            "users.icon"
        )
            ->join("users","users.id","products.merchant_id")
            ->whereIn("products.id", $compareProductLists)
            ->where("products.is_published",1)
            ->with(
                "merchant",
                "recommendTags",
                "highlightTags",
                "productCoupon",
                "freeGift",
                "package",
                "category"
            )
            ->get();
        $productIdList  = Product::whereIn("products.id", $compareProductLists)
            ->whereIsPublished(true)
            ->pluck("products.id")
            ->toArray();

        $subCategories = SubCategory::select("id")->where("category_id",$selectedCategory->id)->pluck("id")->toArray();
        $data = [
            'selectedCategory' => $selectedCategory,
            'productList' => $productList,
            'productIdList' => $productIdList,
            'subCategories' => $subCategories,
            'seo'=>$seo
        ];

        if ($request->ajax()) {
            return view('frontend.product.compare-list', $data)->render();
        }
        return view("frontend.product.compare", $data);
    }

    public function suggestionProductAjax(Request $request)
    {
        $recentViewProducts = array();
        $suggestionProducts = array();
        $recentlyOrRecommended = "";
        //$request->session()->put('recentlyViewedProducts',[1,2,3,5]);
        if ($request->session()->has('recentlyViewedProducts')) {
            $recentViewProducts = $request->session()->get('recentlyViewedProducts');
        }
        if (count($recentViewProducts) > 0) {
            $recentlyOrRecommended = trans('labels.compare.text2');
            $removeCurrentProductIds = array_diff($recentViewProducts, $request->pids);
            if (count($removeCurrentProductIds) > 0) {
                $suggestionProducts = Product::select(
                    "products.id",
                    "products.category_id",
                    "products.featured_img",
                    "products.original_price",
                    "products.discount_price",
                    "products.promotion_price",
                    "products.name_en",
                    "products.name_sc",
                    "products.name_tc",
                    "products.slug_en",
                    "products.merchant_id",
                    "products.number_of_dose",
                    "products.check_up_package_id",
                    "categories.name_en as category_name_en",
                    "products.merchant_id",
                    "users.icon"
                )
                    ->join("categories","categories.id","products.category_id")
                    ->join("users","users.id","products.merchant_id")
                    ->whereIn("products.id", $removeCurrentProductIds)
                    ->where("products.is_published",1)
                    ->where("products.category_id", $request->selectedCategory)
                    ->get();
                if (count($suggestionProducts) < 0) {
                    $recentlyOrRecommended = trans('labels.compare.recommendation');
                    $suggestionProducts = $this->getProductsByCategory($request->selectedCategory, $request->pids);
                }
            } else {
                $recentlyOrRecommended = trans('labels.compare.recommendation');
                $suggestionProducts = $this->getProductsByCategory($request->selectedCategory, $request->pids);
            }
        } else {
            $recentlyOrRecommended = trans('labels.compare.recommendation');
            $suggestionProducts = $this->getProductsByCategory($request->selectedCategory, $request->pids);
        }
        $category = Category::find($request->selectedCategory);
        if (app()->getLocale() == 'en'){
            $data = [
                'suggestionProducts' => $suggestionProducts,
                'recentlyOrRecommended' =>  "Your ". "<span class='font-bold'>" . langbind($category, 'name') . '</span> ' . " " . $recentlyOrRecommended . ''
            ];
        }
        elseif(app()->getLocale() == 'zh-cn'){
            $data = [
                'suggestionProducts' => $suggestionProducts,
                'recentlyOrRecommended' =>  $recentlyOrRecommended. '  ' ."<span class='font-bold'>" . langbind($category, 'name') . '</span> ' .'  '. "产品"
            ]; 
        }
        else{
            $data = [
                'suggestionProducts' => $suggestionProducts,
                'recentlyOrRecommended' =>  $recentlyOrRecommended. '  '."<span class='font-bold'>" . langbind($category, 'name') . '</span> ' . '  '."產品"
            ]; 
        }
       
        return response()->json(['data' => $data]);
    }

    private function getProductsByCategory($categoryId, $productIds)
    {
        $products = Product::select(
            "products.id",
            "products.category_id",
            "products.featured_img",
            "products.original_price",
            "products.discount_price",
            "products.promotion_price",
            "products.name_en",
            "products.name_sc",
            "products.name_tc",
            "products.slug_en",
            "products.merchant_id",
            "products.number_of_dose",
            "products.check_up_package_id",
            "categories.name_en as category_name_en",
            "users.icon"
        )
            ->join("categories","categories.id","products.category_id")
            ->join("users","users.id","products.merchant_id")
            ->where("products.is_published",1)
            ->whereNotIn("products.id", $productIds)
            ->where("products.category_id", $categoryId)
            ->get();
        return $products;
    }
    public function privacy_policy()
    {
        $privacy = Page::where('id',3)->first();
        return view('frontend.terms_privacy',compact('privacy'));
    }

    public function term_of_use()
    {
        $terms = Page::where('id',4)->first();
        return view('frontend.terms_privacy',compact('terms'));
    }

    public function coupon_term_of_use()
    {
        $terms_coupon = Page::where('id',5)->first();
        return view('frontend.terms_privacy',compact('terms_coupon'));
    }

    public function addOrRemoveProductCompare(Request $request)
    {
        $productId = $request->id;
        if ($request->action == "add") {
            if ($request->session()->has('compareProductItems')) {
                $request->session()->push('compareProductItems', $productId);
            } else {
                $request->session()->put('compareProductItems', array($productId));
            }
        } else {
            $compareProductItems = $request->session()->get('compareProductItems');
            $productIdExists = array_search($productId, $compareProductItems);
            if ($productIdExists !== false) {
                unset($compareProductItems[$productIdExists]);
            }
            $request->session()->forget('compareProductItems');
            $request->session()->put('compareProductItems', $compareProductItems);
        }

        return response()->json(["status" => "ok", "data" => $request->session()->get('compareProductItems')]);
    }
    public function sitemapxml()
    {
        $home = Home::whereIsPublished(true)->first();
        $contact_us = ContactUs::first();
        $carrier_page = CarrierPage::first();
        $carriers = Carrier::paginate(10);
        $about = About::first();
        $best_price = BestPrice::first();
        $partnership = Partnership::first();
        $booking_page = BookingProcessPage::first();
        $quick_start_page = QuickStartPage::first();
        $products = Product::whereIsPublished(true)->get();
        $privacy = Page::where('id',3)->first();
        $term = Page::where('id',4)->first();
        $terms_coupon = Page::where('id',5)->first();
        $blogPage = SeoPage::where("title","blog_list")->first();
        $blogs = Blog::whereIsPublished(true)->get();
        $blogCategories = BlogCategory::whereIsPublished(true)->get();
        $coupon_list= SeoPage::where("title","coupon_list")->first();
        $coupon_list= SeoPage::where("title","coupon_list")->first();
        $faqs = Faq::get();
        $faq_page = FaqPage::first();
        return response()->view('frontend.sitemap.index',compact(
            'home',
            'contact_us',
            'carrier_page',
            'carriers',
            'about',
            'best_price',
            'partnership',
            'booking_page',
            'quick_start_page',
            'products',
            'privacy',
            'term',
            'blogPage',
            'blogs',
            'blogCategories',
            'coupon_list',
            'faqs',
            'faq_page',
            'terms_coupon',
        ))->header('Content-Type', 'text/xml');

    }

    public function contactUs(){
        $contact_us = ContactUs::first();
        $contact = Contact::first();
        $bank_info = BankInfo::get();
        $office_info = OfficeInfo::get();
        // dd($contact_us);
        return view('frontend.contact-us',compact('contact_us','bank_info','contact','office_info'));
    }

    public function carrier(){
        $carrier_page = CarrierPage::first();
        // if(empty($carrier_page)){
        //     abort(404);
        // }
        $carriers = Carrier::where('is_published',1)->paginate(10);
        return view('frontend.carrier.carrier',compact('carrier_page','carriers'));
    }

    public function carrierDetail($id){
        if(empty($id)){
            abort(404);
        }
        $carrier_page = CarrierPage::first();
        $carrier = Carrier::where('id',$id)->first();
        if(empty($carrier)){
            abort(404);
        }
        return view('frontend.carrier.detail',compact('carrier_page','carrier'));
    }
    public function about(){
        $about = About::first();
        $empower = Empower::first();
        // dd($empower);
        // if(empty($about)){
        //     abort(404);
        // }
        // if(empty($empower)){
        //     abort(404);
        // }
        $years = MilestoneYear::orderBy('year','desc')->get();
        // dd($oddRows);
        return view('frontend.about',compact('about','empower','years'));
    }

    public function bestPrice(){
        $best_price = BestPrice::first();
        if(empty($best_price)){
            abort(404);
        }
        $best_price_detail = BestPriceDetail::get()->take(4);
        // dd($best_price_detail);
        return view('frontend.best-price',compact('best_price','best_price_detail'));
    }

    public function partnership(){
        $partnership = Partnership::first();
        if(empty($partnership)){
            abort(404);
        }
        $partnership_detail = PartnershipDetail::get();
        $partnership_help = PartnershipHelp::get();
        // dd($best_price_detail);
        return view('frontend.partnership.partnership',compact('partnership','partnership_detail','partnership_help'));
    }

    public function savePartnership(ContactCustomerRequest $request){
        // dd($request);
        $request['serviceOption'] = json_encode($request['serviceOption']);
        ContactCustomer::create($request->all());
        return response()->json(["message" => trans('labels.partnership.success')]);
       // return trans('labels.header.no_result');
    }

    public function booking(){
        $booking = BookingProcess::orderBy('sort','asc')->get();
        $booking_page = BookingProcessPage::first();
        // if(empty($booking_page)){
        //     abort(404);
        // }
        // dd($booking);
        return view('frontend.quick_start',compact('booking','booking_page'));
    }

    public function quickStart(){
        $quick_start = QuickStartGuide::orderBy('sort','asc')->get();
        $quick_start_page = QuickStartPage::first();
        if(empty($quick_start_page)){
            abort(404);
        }
        return view('frontend.quick_start',compact('quick_start','quick_start_page'));
    }

    public function cookie(Request $request){
         if($request->header_footer == 'footer-cookie'){
            $cookie = Cookie::forever('footer_closed', 'footer_closed');
            $response = new Response(["message" => 'Your message']);
         }
         else{
            $cookie = Cookie::forever('header_closed', 'header_closed');
            $response = new Response(["message" => 'Your message']);
         }
         $response->withCookie($cookie);
         return $response;
    }

    public function productsFilter(){
        $main_categories = Category::whereIsPublished(true)->get();
        $selected_categories = [];
        $brands = Merchant::where('is_merchant', true)->get();
        $selected_merchants = [];
        return view('frontend.prodcut-filter.prodcut-filter',compact('main_categories','selected_categories','brands','selected_merchants'));
    }
    public function filterRestul(Request $request){
      
    }
}
