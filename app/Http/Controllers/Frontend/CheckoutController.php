<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Area;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SeoPage;
use App\Models\CardInfo;
use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use Stripe\StripeClient;
use App\Mail\GeneralMail;
use App\Models\PromoCode;
use App\Models\Recipient;
use App\Models\Territory;
use App\Models\OrderItems;
use App\Models\BillingInfo;
use App\Models\PaymentInfo;
use App\Models\FamilyMember;
use App\Models\UsePromoCode;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\RecipientItem;
use App\Models\UserPromoCode;
use App\Models\StripeCustomer;
use App\Repositories\OrderRepo;
use App\Services\StripeService;
use App\Models\ProductVariation;
use App\Repositories\CouponRepo;
use App\Models\OptionDecideLater;
use App\Models\RecipientAddOnItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkoutInit(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $recipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer_id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',0)->get();
        $isTwoRecipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer_id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',1)->get();
        $collected_coupons = Coupon::select('coupons.*')->whereIsPublished(true)
            ->join('coupon_collects','coupons.id','=','coupon_collects.coupon_id')
            ->where('coupon_collects.customer_id',$customer_id);
        $couponRepo = new CouponRepo;
        $coupons = $couponRepo->checkAvailableCoupon($customer_id,$collected_coupons,$recipients,$isTwoRecipients);
        $availableCoupons = $coupons['availableCoupons'] ?? [];
        $notAvailableCoupons = $coupons['notAvailableCoupons'] ?? [];
        $main_categories = Category::whereIsPublished(true)->get();
        $seo = SeoPage::where('title','checkout_selected_item')->first();
        return view('frontend.checkouts.checkout-init',compact(
            'recipients',
            'isTwoRecipients',
            'availableCoupons',
            'notAvailableCoupons',
            'main_categories',
            'seo',
        ));
    }
    
    public function checkoutInfo(Request $request)
    {
        if(!$request['is_info'] || isset($request['is_info']) && $request['is_info'] != session()->get('is_info')){
            return redirect()->route('checkout.init');
        }
        $customer = Auth::guard('customer')->user();
        $recipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer->id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',0)->get();
        $isTwoRecipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer->id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',1)->get();
        $collected_coupons = Coupon::select('coupons.*')->whereIsPublished(true)
            ->join('coupon_collects','coupons.id','=','coupon_collects.coupon_id')
            ->where('coupon_collects.customer_id',$customer->id);
        $couponRepo = new CouponRepo;
        $coupons = $couponRepo->checkAvailableCoupon($customer->id,$collected_coupons,$recipients,$isTwoRecipients);
        $availableCoupons = $coupons['availableCoupons'] ?? [];
        $notAvailableCoupons = $coupons['notAvailableCoupons'] ?? [];
        $total_amounts = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices') +$isTwoRecipients->sum('each_recipient_amount') + $isTwoRecipients->sum('add_on_prices');
        $selected_coupon = Session::get('coupon');
        $selected_promocode = Session::get('promoCode');
        session()->forget('coupon');
        session()->forget('promoCode');
        $seo = SeoPage::where('title','checkout_enter_information')->first();
        return view('frontend.checkouts.checkout-info',compact(
            'recipients',
            'isTwoRecipients',
            'availableCoupons',
            'notAvailableCoupons',
            'customer',
            'total_amounts',
            'selected_coupon',
            'selected_promocode',
            'seo',
        ));
    }

    public function checkoutPayment(Request $request)
    {
        if(!$request['is_payment'] || isset($request['is_payment']) && $request['is_payment'] != session()->get('is_payment')){
            return redirect()->to(url('checkout-info?is_info='.session()->get('is_info')));
        }
        $summaryData = (object)Session::get('summaryData');
        $checkoutItems = (object)Session::get('checkoutItems');
        if(empty($summaryData)){
            abort(404);
        }
        $customer_id = Auth::guard('customer')->user()->id;
        $customer = Auth::guard('customer')->user();
        if(isset($summaryData->offlinePayment) && $summaryData->offlinePayment==true){
            $recipients = Recipient::with(['product','customer','recipient_add_on_items','recipient_items'])
                                ->where('customer_id',$customer_id)
                                ->where('recipients.is_ordered_checkout',0)
                                ->get();
        }else{
            $current_order_id = $summaryData->currentOrderId;
            $recipientIds = OrderItems::where("orders_id",$current_order_id)->pluck("recipient_id")->toArray();
            $recipients = Recipient::with(['product','customer','recipient_add_on_items','recipient_items'])
                                ->where('customer_id',$customer_id)
                                ->where('recipients.is_ordered_checkout',1)
                                ->whereIn("recipients.id",$recipientIds)
                                ->get();
        }
       
        $datas= [];
        foreach($recipients as $key => $item){
            if($item->product->is_two_recipient == false){
                $datas['sample'][$key] = $item;
            }
            if($item->product->is_two_recipient == true){
                $datas['two_person_plan'][$key] = $item;
            }
        }
        $coupons = Coupon::select('coupons.*')->whereIsPublished(true)
        ->join('coupon_collects','coupons.id','=','coupon_collects.coupon_id')
        ->where('coupon_collects.customer_id',$customer_id)->get();
        $total_amounts = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices');
        $summaryData = (object)Session::get('summaryData');
        $territories = Territory::get();
        $districts = District::get();
        $areas = Area::get();
        $amount = str_replace(".", "",number_format($total_amounts, 2, '.', '')) ?? 0;
        if(isset($summaryData->discount_type) && $summaryData->discount_type == 'percent'){
            $amount = round((($total_amounts) / 100) * $summaryData->codePrice, 0);
            $code_price = $total_amounts - $amount;
        }else{
            if(isset($summaryData->codePrice) && $summaryData->codePrice > $total_amounts){
                $code_price = 0;
            }else{
                $code_price = $total_amounts - $summaryData->codePrice;
            }
        }
        $intentAmount = str_replace(".", "",number_format($code_price, 2, '.', '')) ?? 0; 
        $seo = SeoPage::where('title','order_checkout')->first();
        $getData = isset($datas['two_person_plan']) && count($datas['two_person_plan']) > 0 ? $datas['two_person_plan'] : $datas['sample'];
        $checkProductType = collect($getData)->first()->product;
        $paymentInfo = PaymentInfo::first();
        return view('frontend.checkouts.checkout-payment',compact(
            'datas',
            'recipients',
            'coupons',
            'customer',
            'total_amounts',
            'amount',
            'intentAmount',
            'summaryData',
            'checkoutItems',
            'territories',
            'districts',
            'areas',
            'seo',
            'checkProductType',
            'paymentInfo',
           
        ));
    }

    public function checkoutComplete(Request $request,$invoice)
    {
        $order = (object)Session::get('checkoutOrder');
        $customer = Auth::guard('customer')->user();
        if( Session::get('checkoutOrder') == null && $customer != null){
            abort(404);
        }
        $cardInfo = (object)Session::get('cardInfo') ? (object)Session::get('cardInfo') : [];
        $items = $order->orderItems->map(function($item,$key){
            $addOnItemDiscount= collect($item->recipient->add_on_data)->map(function($addOn,$akey){
                return  isset($addOn->discount_price) ? $addOn->original_price - $addOn->discount_price : 0;
            });
            
            $allDisAmount = $item->discount_amount + $addOnItemDiscount->sum() ?? 0;
            return $allDisAmount;
        });
        $isDis = 0;
        if(isset($order->coupon_id)){
            if($order->coupon->discount_type == 'percent'){
                $isDis = $order->sub_total/100 * $order->coupon->coupon_amount;
            }else{
                $isDis = $order->coupon->coupon_amount;
            }
        }
        if(isset($order->promo_code_id)){
            $isDis = $order->promoCode->amount;
        }
        $itemsAmount = $items->sum() + $isDis;
        $seo = SeoPage::where('title','checkout_thank_you')->first();
        return view('frontend.checkouts.checkout-complete',compact('order','cardInfo','customer','itemsAmount','seo'));
    }

    public function checkoutPending(Request $request,$invoice)
    {
        $seo = SeoPage::where('title','checkout_pending')->first();
        return view('frontend.checkouts.checkout-pending',compact('seo'));
    }

    public function paymentIntents(Request $request)
    {
        $cardName = '';
        $customer = Auth::guard('customer')->user();
        $customer_phone = Session::get('customer_phone');
        if($customer_phone == null || $customer_phone == ''){
            return redirect()->back()->with('fill_phone', 'Must fill phone number in recipient info.');
        }
        $customer_id = Auth::guard('customer')->user()->id;
        if($request->currentOrderId==0){
            $recipients = Recipient::with(['product','customer','recipient_add_on_items','recipient_items'])
                                ->where('customer_id',$customer_id)
                                ->where('recipients.is_ordered_checkout',0)
                                ->get();
        }else{
            $current_order_id = $request->currentOrderId;
            $recipientIds = OrderItems::where("orders_id",$current_order_id)->pluck("recipient_id")->toArray();
            $recipients = Recipient::with(['product','customer','recipient_add_on_items','recipient_items'])
                                ->where('customer_id',$customer_id)
                                ->where('recipients.is_ordered_checkout',1)
                                ->whereIn("recipients.id",$recipientIds)
                                ->get();
        }
        // $recipients = Recipient::with(['product','customer','recipient_add_on_items','recipient_items'])
        // ->where('customer_id',$customer_id)->where('recipients.is_ordered_checkout',0)->get();
        $total_amounts = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices');
        $stripe = $this->initStripe();
        $summaryData = (object)Session::get('summaryData');
        $amount = str_replace(".", "",number_format($total_amounts, 2, '.', '')) ?? 0;
        if(isset($summaryData->discount_type) && $summaryData->discount_type == 'percent'){
            $amount = round((($total_amounts) / 100) * $summaryData->codePrice, 0);
            $code_price = $total_amounts - $amount;
        }else{
            if(isset($summaryData->codePrice) && $summaryData->codePrice > $total_amounts){
                $code_price = 0;
            }else{
                $code_price = $total_amounts - $summaryData->codePrice;
            }
        }
        $intentAmount = str_replace(".", "",number_format($code_price, 2, '.', '')) ?? 0; 
        $paymentIntent = $stripe->paymentIntents->create([
            'payment_method_types' => ['card'],
            'amount' => $intentAmount,
            'currency' => 'hkd',
        ]);
        $paymentIntentId = $paymentIntent->id;
        $checkoutItems = Session::get('checkoutItems');
        $checkoutItems['cardType'] = $request['cardType'];
        $checkoutItems['cardName'] = $cardName;
        $checkoutItems['saveCard'] = $request['saveCard'];
        $order = new OrderRepo;
        $order = $order->saveCheckoutOrders($checkoutItems);
        $order->update([
            'stripe_payment_id' => $paymentIntentId
        ]);
        \Session::put('checkoutOrder',$order);
        $result = [
            'clientSecret' => $paymentIntent->client_secret,
            'checkoutComplete' => route('checkout.checkoutComplete',$order->invoice_no),
        ];
        $billing_customer_name = "";
        $billing_customer_address = "";
        if($request->printed_receipt == 'yes' ){
            $billing_customer_name = $request->name;
            if(isset($request->address)){
                $billing_customer_address .= "$request->address, ";
            }
            if(isset($request->district_id)){
                $districts = District::find($request->district_id);
                $billing_customer_address .= "$districts->name_en, ";
            }
            if(isset($request->territory_id)){
                $territory = Territory::find($request->territory_id);
                $billing_customer_address .= "$territory->name_en, ";
            }
            $billing_customer_address .= "HONG KONG";
            BillingInfo::create([
                'name' => $request->name,
                'email' => $request->email,
                'country' => $request->country,
                'address' => $request->address,
                'area_id' => $request->area_id,
                'district_id' => $request->district_id,
                'territory_id' => $request->territory_id,
                'customer_id' => $customer_id,
                'order_id' => $order->id,
                'special_request' => $request->special_request,
                'save_info' => $request->save_info == 'on' ? 1 : 0,
            ]);
        }
        
        $customerInfo = [
            'id' => $customer->id,
            'email' => $customer->email,
            'name' => $customer->first_name.' '.$customer->last_name,
            'card_type' => $request['cardType'] == 'other_pay' ? 'Offline' : $cardName,
            'order_processing_mail' => 'order_processing_mail',
            'billing_customer_name'=>$billing_customer_name,
            'billing_customer_address'=>$billing_customer_address

        ];
        $datas = [];
        $datas['order'] = $order;
        $datas['customerInfo'] = $customerInfo;
        // $orderItems = $order->orderItems->map(function($item){
            foreach($order->orderItems as $key => $item){
                if($item->recipient->product->is_two_recipient == false){
                    $datas['sample'][$key] = $item;
                }
                if($item->recipient->product->is_two_recipient == true){
                    $datas['two_person_plan'][$key] = $item;
                }
            }
        // });
        $datas['card_type'] = $customerInfo['card_type'];
        $datas['print'] = $request['printed_receipt'];
        Mail::to($customer->email)->send(new GeneralMail($datas));
        // $datas['admin'] = 'admin_order_confirm';
        // Mail::to(config('app.email'))->send(new GeneralMail($datas));
        // if($request['printed_receipt'] == 'yes'){
        //     $datas['print'] = 'yes';
        //     Mail::to($customer->email)->send(new GeneralMail($datas));
        // }
        Session::flash('success', 'Payment successful!');
        Session::put('card_no',$request['card_no'] ?? '');
        session()->forget('is_info');
        session()->forget('is_payment');
        session()->forget('customer_phone');
        return response()->json($result);
    }

    public function saveCheckUpItems(Request $request)
    {
        $input = $request->all();
        $recipient = Recipient::findOrFail($input['recipient_id']);
        RecipientItem::where('recipient_id',$input['recipient_id'])->where('product_id',$input['product_id'])
        ->where('check_up_group_id',$input['group_id'])->delete();
        OptionDecideLater::where('recipient_id',$input['recipient_id'])->where('product_id',$input['product_id'])
        ->where('group_id',$input['group_id'])->delete();
        $check_up_items = $input['check_up_items-'.$input['group_id'].$input['recipient_id']];
        if(explode(',',$check_up_items)[0] != ""){
            foreach(explode(',',$check_up_items) as $item){
                $reci = RecipientItem::create([
                    'recipient_id' => $input['recipient_id'],
                    'product_id' => $input['product_id'],
                    'check_up_group_id' => $input['group_id'],
                    'check_up_item_id' => $item,
                    'edit_status' => $input['edit_status']??null
                ]);
            }
        }
        $ids = $input['group_id'].$input['recipient_id'];
        if(isset($input['check_up_items_decide_later_'.$ids])){
            OptionDecideLater::create([
                'recipient_id' => $input['recipient_id'],
                'product_id' => $input['product_id'],
                'group_id' => $input['group_id'],
                'is_decide_later' => $input['check_up_items_decide_later_'.$ids] === "true" ? 1 : 0,
            ]);
        }
        return response()->json(['status' => 200]);
    }
    public function savePackages(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $recipient = Recipient::find($request->recipient_id);
        $old_pv = ProductVariation::find($recipient->variable_id);
        $recipient->update([
            'each_recipient_amount' => $recipient->each_recipient_amount -= $this->getProductPrice($old_pv)
        ]);
        $new_pv = ProductVariation::find($request->variable_id);
        $recipient->where('id',$request->recipient_id)
        ->update([
            'variable_id' => $request->variable_id,
            'each_recipient_amount' => $recipient->each_recipient_amount += $this->getProductPrice($new_pv)
        ]);
        $total_price = $recipient->each_recipient_amount + $recipient->add_on_prices;
        $each_recipient_amount = Recipient::where('is_ordered_checkout',false)->where('customer_id',$customer_id)->sum('each_recipient_amount');
        $add_on_prices = Recipient::where('is_ordered_checkout',false)->where('customer_id',$customer_id)->sum('add_on_prices');
        $total_amount = $each_recipient_amount + $add_on_prices;
        return response()->json([
            'status' => 200,
            'is_variable' => true,
            'recipient_id' => $request->recipient_id,
            'total_price' => $total_price,
            'total_amount' => $total_amount,
        ]);
    }
    public function saveCheckUpLocations(Request $request)
    {
        $input = $request->all();
        $customer_id = Auth::guard('customer')->user()->id;
        $recipientOldDate = Recipient::select('date')
        ->where('customer_id',$customer_id)
        ->where('id',$request->recipient_id)->first();
        $date = date("Y-m-d ", strtotime($request['date']));
        $recipient = Recipient::findOrFail($request['recipient_id']);
        $decide_later = $input['decide-laterreceipientData'.$recipient->id];
        $recipient->update([
            'date' => $decide_later != "true" ? $date : null,
            'time' => $decide_later != "true" ? $input['time'] : null,
            'location' => $decide_later != "true" ? $input['location_id'] : null,
            'is_prefer_time_decide_later' => $input['decide-laterreceipientData'.$recipient->id] == "true" ? 1 : 0,
            'edit_date'=>$decide_later != "true"&& $request['order_details_edit']==1?1:0,
            'edit_location'=>$decide_later != "true"&& $request['order_details_edit']==1?1:0,
            'edit_time'=>$decide_later != "true"&& $request['order_details_edit']==1?1:0,
        ]);
        $getRecipients = Recipient::select('date')
        ->where('customer_id',$customer_id)
        ->where('is_ordered_checkout',0);
        $totalRecipient = $getRecipients->whereDate('date',date('Y-m-d'))->count() + $getRecipients->whereDate('date','<',date('Y-m-d'))->count();
        $is_old_date = false;
        if(
            ($recipientOldDate->date != null && $recipientOldDate->date < date('Y-m-d')) || 
            ($recipientOldDate->date != null && $recipientOldDate->date == date('Y-m-d'))
        ){
            $is_old_date = true;
        }
        return response()->json([
            'status' => 200,
            'allReicipients' => $totalRecipient,
            'is_old_date' => $is_old_date,
        ]);
    }

    public function saveAddOnItems(Request $request)
    {
        $input = $request->all();
        $customer_id = Auth::guard('customer')->user()->id;
        $cart = Cart::where('customer_id', $customer_id)->where('product_id', $request['product_id'])->first();
        $recipient = Recipient::find($input['recipient_id']);
        if($recipient->add_on_prices != null){
            $cart->update([
                'price' => $cart->price -= $recipient->add_on_prices
            ]);
        }
        $recipient->update([ 'add_on_prices' => null]);
        RecipientAddOnItem::where('recipient_id',$input['recipient_id'])->where('product_id',$input['product_id'])->delete();
        if(count(json_decode($input['add_on_items'])) > 0){
            foreach(json_decode($input['add_on_items']) as $item){
                $price = $recipient->add_on_prices += isset($item->discount_price) && $item->discount_price !== ""  ? $item->discount_price : $item->original_price;
                $recipient->update(['add_on_prices' => $price]);
                $cart->update([
                    'price' => $cart->price  += isset($item->discount_price) && $item->discount_price !== ""  ? $item->discount_price : $item->original_price
                ]);
                RecipientAddOnItem::create([
                    'recipient_id' => $input['recipient_id'], 
                    'product_id' => $input['product_id'], 
                    'add_on_item_id' => $item->id, 
                ]);
            }
        }else{
            $recipient->update(['is_add_on_decide_later' => $input['addson-noaddition-receipientData'.$recipient->id]]);
        }

        return response()->json([
            'status' => 200,
        ]);
    }

    public function removeRecipient(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $input = $request->all();
        $is_exist_cart = null;
        if($input != [] && isset($input['recipient_id1']) && isset($input['recipient_id2'])){
            $is_exist_cart = Recipient::select('cart_id','each_recipient_amount','add_on_prices','date')->where('id',$input['recipient_id1'])->where('customer_id', $customer_id)->first();
            $is_exist_cart_price = Recipient::select('cart_id','each_recipient_amount','add_on_prices','date')->where('id',$input['recipient_id2'])->where('customer_id', $customer_id)->first();
            $price = ($is_exist_cart->each_recipient_amount + $is_exist_cart->add_on_prices) + $is_exist_cart_price->add_on_prices;
            foreach([$input['recipient_id1'], $input['recipient_id2']] as $item){
                Recipient::where('id',$item)->where('customer_id', $customer_id)->delete();
                RecipientItem::where('recipient_id',$item)->delete();
                RecipientAddOnItem::where('recipient_id',$item)->delete();
                OptionDecideLater::where('recipient_id',$item)->delete();
            }
        }else{
            if($input != [] && isset($input['recipientId'])){
                $is_exist_cart = Recipient::select('cart_id','each_recipient_amount','add_on_prices','date')->where('id',$input['recipientId'])->where('customer_id', $customer_id)->first();
                $price = ($is_exist_cart->each_recipient_amount + $is_exist_cart->add_on_prices) ;
                Recipient::where('id',$input['recipientId'])->where('customer_id', $customer_id)->delete();
                RecipientItem::where('recipient_id',$input['recipientId'])->delete();
                RecipientAddOnItem::where('recipient_id',$input['recipientId'])->delete();
                OptionDecideLater::where('recipient_id',$input['recipientId'])->delete();
            }
        }
        $cart = 0;
        if(isset($is_exist_cart)){
            $cart = Cart::where('id',$is_exist_cart['cart_id'])->where('product_id',$request['productId'])->where('customer_id', $customer_id)->first();
            if($cart != null){
                $cart->update([
                    'qty' => $cart->qty -= 1,
                    'price' => $cart->price -= $price
                ]);

                if($cart->qty == 0){
                    Cart::where('id',$cart->id)->delete();
                }
            }
            $cart = Cart::where('customer_id', $customer_id)->sum('qty');
        }
        $oneRecipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer_id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',0)->get();
        $isTwoRecipients = Recipient::select('recipients.*')
        ->join('products','recipients.product_id','=','products.id')
        ->where('recipients.customer_id',$customer_id)
        ->where('recipients.is_ordered_checkout',0)->where('products.is_two_recipient',1)->get();
        $collected_coupons = Coupon::select('coupons.*')->whereIsPublished(true)
            ->join('coupon_collects','coupons.id','=','coupon_collects.coupon_id')
            ->where('coupon_collects.customer_id',$customer_id);
        $couponRepo = new CouponRepo;
        $coupons = $couponRepo->checkAvailableCoupon($customer_id,$collected_coupons,$oneRecipients,$isTwoRecipients);
        $availableCoupons = collect($coupons['availableCoupons']) ?? [];
        $notAvailableCoupons = $coupons['notAvailableCoupons'] ?? [];

        $recipients = Recipient::where('customer_id', $customer_id)->where('is_ordered_checkout',false)
        ->select('id','customer_id','is_ordered_checkout','each_recipient_amount','add_on_prices')->get();
        $total_amount = $recipients->sum('each_recipient_amount') + $recipients->sum('add_on_prices');
        
        $is_old_date = false;
        if(
            (isset($is_exist_cart->date) && $is_exist_cart->date != null && $is_exist_cart->date < date('Y-m-d')) ||
            (isset($is_exist_cart->date) && $is_exist_cart->date == date('Y-m-d')) 

        ){
            $is_old_date = true;
        }
        return response()->json([
            'status' => 200,
            'recipients' => $recipients,
            'total_amount' => $total_amount,
            'cart' => $cart,
            'availableCoupons' => $availableCoupons,
            'notAvailableCoupons' => $notAvailableCoupons,
            'old_date' => $is_old_date,
        ]);
    }

    public function updateRecipientInfo(Request $request)
    {
        $recipientIds =[];
        $customer_id = Auth::guard('customer')->user()->id;
        if(count($request['cardData']) > 0){
            foreach($request['cardData'] as $key => $data){
                $id = str_replace('receipientData','',$data['id']);
                $recipientIds[$key] = $id;
                $recipient = Recipient::find($id);
                if(!isset($data['title'])){
                    return response()->json([
                        'status' => 404,
                        'id' => $recipient->id
                    ]);
                }
                $title = isset($data['title']) && $data['title'] == '1' ? 'true' : 'false';
                $recipientDatas[$key] = $recipient->update([
                    'title' => $title,
                    'last_name' => $data['lastName'],
                    'first_name' => $data['firstName'],
                    'phone' => $data['eachcountrycode'].$data['phone'],
                    'remark' => $data['specialRequest'] ?? '',
                ]);
                $getFamilyMember = FamilyMember::where('id',$data['userId'])->first();
                if(isset($getFamilyMember)){
                    $getFamilyMember->update([
                        'customer_id' => $customer_id,
                        'title' => $title,
                        'last_name' => $data['lastName'] ?? '',
                        'first_name' => $data['firstName'] ?? '',
                        'phone' => $data['eachcountrycode'].$data['phone'] ?? '',
                    ]);
                }
                if($data['isSave'] == "true"){
                    FamilyMember::create([
                        'customer_id' => $customer_id,
                        'title' => $title,
                        'last_name' => $data['lastName'],
                        'first_name' => $data['firstName'],
                        'phone' => $data['eachcountrycode'].$data['phone'],
                        'relationship_type_id' => 5
                    ]);
                }
            }
        }
        
        Customer::where('id',$customer_id)->update([
            'last_name' => $request['contactInfo']['lastName'],
            'first_name' => $request['contactInfo']['firstName'],
            'title_full_name' => $request['contactInfo']['title'],
            // 'phone' => $request['contactInfo']['countrycode'].$request['contactInfo']['phone'],
        ]);
        Session::put('customer_phone',$request['contactInfo']['countrycode'].$request['contactInfo']['phone']);
        Session::put('summaryData',$request['summaryData']);
        $recipientDatas = Recipient::whereIn('id',$recipientIds)->get();
        
        $checkoutItems = [
            'recipientData' => $recipientDatas,
            'summaryData' => $request['summaryData'],
        ];
        Session::put('checkoutItems',$checkoutItems);
        return response()->json(['status' => 200]);

    }

    public function checkPromoCode(Request $request)
    {
        $input = $request->all();
        $date = Carbon::now();
        $customer_id = Auth::guard('customer')->user()->id;
        $recipients = Recipient::select('product_id')->where('customer_id',$customer_id)
        ->where('is_ordered_checkout',0)->pluck('product_id')->toArray();
        $promoCode = PromoCode::where('code',$input['code'])->whereIsPublished(true)
        ->whereDate('end_date', '>=', $date->format('Y-m-d'))->first();
        if(isset($promoCode->product_category_id)){
            $products =Product::whereIsPublished(true)->where('category_id',$promoCode->product_category_id)
            ->whereIn('id',$recipients)->exists();
            if($products == false){
                $promoCode = null;
            }
            
            if($promoCode){
                $peruser = UserPromoCode::where('promo_code_id',$promoCode->id)->where('customer_id',$customer_id)->first();
                $percoupon = UsePromoCode::where('promo_code_id',$promoCode->id)->groupBy('customer_id')->get();
                $peruser = isset($peruser) ? $peruser->use_count : 0;
                $percoupon = count($percoupon)> 0 ? $percoupon->count() : 0;
               
               
                if($peruser){
                    if($peruser < $promoCode->user_limit){
                        $promoCode = $promoCode;
                    }else{
                        $promoCode = null;
                    }
                    
                }else{
                    if($percoupon < $promoCode->use_limit){
                        $promoCode = $promoCode;
                    }else{
                        $promoCode = null;
                    }
                }
                
            }else{
                $promoCode = null;
            }
        }else{
            $promoCode = null;
        }
        return response()->json([
            'status' => 200,
            'promo_code' => $promoCode,
        ]);
    }
    

    public function bookNow(Request $request)
    {
        $coupon = '';
        $promoCode = '';
        if(isset($request['code_type_id']) && isset($request['code_type'])){
            if($request['code_type'] == 'coupon_code'){
                $coupon = Coupon::where('id',$request['code_type_id'])->first();
                Session::put('coupon', $coupon);
            }
            if($request['code_type'] == 'promo_code'){
                $promoCode = PromoCode::where('id',$request['code_type_id'])->first();
                Session::put('promoCode', $promoCode);
            }
        }else{
            session()->forget('coupon');
            session()->forget('promoCode');
        }
        return response()->json([
            'status' => 200,
        ]);
    }

    public function orderCheckout(Request $request)
    {
        $cardName= '';
        $customer = Auth::guard('customer')->user();
        $customer_phone = Session::get('customer_phone');
        if($customer_phone == null || $customer_phone == ''){
            return redirect()->back()->with('fill_phone', 'Must fill phone number in recipient info.');
        }
        // if($customer->is_verified == false || $customer->email_is_verified == false){
        //     return redirect()->back()->with('verified_phone', trans('labels.phone_verify_sms'));
        // }
        try{
            DB::beginTransaction();
            $stripe = $this->initStripe();
            $checkoutItems = Session::get('checkoutItems');
            $checkoutItems['cardType'] = $request['cardType'];
            $checkoutItems['cardName'] = $cardName;
            $checkoutItems['saveCard'] = $request['saveCard'];
            $checkoutItems['cus_str_id'] = $request['cus_str_id'];
            $checkoutItems['currentOrderId'] = $request['currentOrderId'];
            // $order = $this->saveCheckoutOrders($checkoutItems);
            // Session::put('checkoutOrder',$order);
    
            if($request['cardType'] != 'other_pay'){
                $stripeService = new StripeService;
                // credit card information 
                $cardInfo['stripeToken'] = $request->stripeToken;
                $cardInfo['card_code'] = $request['card_no'];
                $cardInfo['cvv'] = $request['cvv'];
                $cart_mm_yy = explode('/',$request['expire_date']);
                $cardInfo['expire_month'] =  $cart_mm_yy[0] ?? '';
                $cardInfo['expire_year'] = $cart_mm_yy[1] ?? '';
                $result = $stripeService->payment($cardInfo,$checkoutItems);
                $cardName = $result['brand'] ?? '';
                // dd($result['status_code'] == "404");
                if($result['status_code'] == '404'){
                    return redirect()->back()->with('invalid_card', 'Your card was declined');
                }
                $order = isset($result['order']) ? (object)$result['order'] : '';

            }else{
                $order = new OrderRepo;
                $order = $order->saveCheckoutOrders($checkoutItems);
            }
            $billing_customer_name = "";
            $billing_customer_address = "";
            if($request->printed_receipt == 'yes' ){
                $billing_customer_name = $request->name;
                if(isset($request->address)){
                    $billing_customer_address .= "$request->address, ";
                }
                if(isset($request->district_id)){
                    $districts = District::find($request->district_id);
                    $billing_customer_address .= "$districts->name_en, ";
                }
                if(isset($request->territory_id)){
                    $territory = Territory::find($request->territory_id);
                    $billing_customer_address .= "$territory->name_en, ";
                }
                $billing_customer_address .= "HONG KONG";
                BillingInfo::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'country' => $request->country,
                    'address' => $request->address,
                    'area_id' => $request->area_id,
                    'district_id' => $request->district_id,
                    'territory_id' => $request->territory_id,
                    'customer_id' => $customer->id,
                    'order_id' => $order->id,
                    'special_request' => $request->special_request,
                    'save_info' => $request->save_info == 'on' ? 1 : 0,
                ]);
            }
    
            $stripe->customers->create([
                'name' => $customer->first_name.' '.$customer->last_name,
                'email' => $customer->email,
                'description' => 'My First Test Customer',
            ]);
            $customerInfo = [
                'id' => $customer->id,
                'email' => $customer->email,
                'name' => $customer->first_name.' '.$customer->last_name,
                'card_type' => $request['cardType'] == 'other_pay' ? 'Offline' : $cardName,
                'order_processing_mail' => 'order_processing_mail',
                'billing_customer_name'=>$billing_customer_name,
                'billing_customer_address'=>$billing_customer_address
            ];
            $datas = [];
            $datas['order'] = $order;
            $datas['customerInfo'] = $customerInfo;
            // $orderItems = $order->orderItems->map(function($item){
                foreach($order->orderItems as $key => $item){
                    if($item->recipient->product->is_two_recipient == false){
                        $datas['sample'][$key] = $item;
                    }
                    if($item->recipient->product->is_two_recipient == true){
                        $datas['two_person_plan'][$key] = $item;
                    }
                }
            // });
            $datas['card_type'] = $request['cardType'];
            $datas['print'] = $request->printed_receipt;
            Mail::to($customer->email)->send(new GeneralMail($datas));
            $datas['admin'] = 'admin_order_confirm';
            // Mail::to(config('app.email'))->send(new GeneralMail($datas)); // for direct admin
            // if($request['printed_receipt'] == 'yes' && $request['cardType'] != 'other_pay'){
            //     $datas['print'] = 'yes';
            //     Mail::to($customer->email)->send(new GeneralMail($datas));
            // }
            Session::flash('success', 'Payment successful!');
            Session::put('card_no',$request['card_no']);
            session()->forget('is_info');
            session()->forget('is_payment');
            session()->forget('customer_phone');
            DB::commit();
            if($request['cardType'] == 'other_pay'){
                return redirect()->route('checkout.checkoutPending',$order->invoice_no);
            }
            return redirect()->route('checkout.checkoutComplete',$order->invoice_no);
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('invalid_card', 'Your card was declined');
            // array_push($message['message'],'Your card was declined');
            // return $message;

        } 
    }



    // function validateCardNumber($cardNumber) {
    //     $cardNumber = preg_replace('/[\s\-]+/', '', $cardNumber);
        
    //     if (preg_match('/^5[1-5][0-9]{14}$/', $cardNumber)) {
    //         return 'MasterCard';
    //     }
        
    //     if (preg_match('/^3[47][0-9]{13}$/', $cardNumber)) {
    //         return 'American Express';
    //     }
        
    //     if (preg_match('/^62[0-9]{14,17}$/', $cardNumber)) {
    //         return 'UnionPay';
    //     }
        
    //     if (preg_match('/^4[0-9]{12,18}$/', $cardNumber)) {
    //         return 'Debit Card';
    //     }

    //     if (preg_match('/^4[0-9]{15}$/', $cardNumber)) {
    //         return 'Visa Card';
    //     }
        
    //     return 'Invalid Card';
    // }

    // function isVisaCardValid($cardNumber) {
    //     // Remove any non-digit characters
    //     $cardNumber = preg_replace('/\D/', '', $cardNumber);
        
    //     // Check if the card number is 16 digits long and starts with '4' (Visa)
    //     if (preg_match('/^4[0-9]{15}$/', $cardNumber)) {
    //             // Apply the Luhn algorithm to validate the card number
    //             $sum = 0;
    //             $length = strlen($cardNumber);
    //             $isSecondDigit = false;

    //             for ($i = $length - 1; $i >= 0; $i--) {
    //                 $digit = (int)$cardNumber[$i];

    //                 if ($isSecondDigit) {
    //                     $digit *= 2;
    //                     if ($digit > 9) {
    //                         $digit -= 9;
    //                     }
    //                 }

    //                 $sum += $digit;
    //                 $isSecondDigit = !$isSecondDigit;
    //             }

    //             return ($sum % 10) === 0;
    //         }

    //         return false;
    //     }

        // $cardNumber = "4xxxxxxxxxxxxxxx"; // Replace with the actual card number
        // if (isVisaCardValid($cardNumber)) {
        //     echo "Valid Visa Card";
        // } else {
        //     echo "Invalid Visa Card";
        // }


    public function initStripe()
    {
        // $stripeInfo = $this->generalSettingRepo->getPaymentTypeBy('stripe');
        $stripe_secret_key = config('app.stripe_secret') ;
        Stripe::setApiKey($stripe_secret_key);
        $stripe = new StripeClient([
            "api_key" => $stripe_secret_key
          ]);
        return $stripe;
    }

    public function checkPhoneNo(Request $request)
    {
        $phone = Customer::where('phone',$request['number'])->exists();
        if($phone){
            return response()->json([
                'status' => 200,
                'number' => $request['number'],
            ]);
        }else{
            return response()->json(['status' => 404]);
        }
    }

}