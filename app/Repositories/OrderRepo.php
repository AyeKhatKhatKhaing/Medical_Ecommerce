<?php

namespace App\Repositories;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Recipient;
use App\Models\OrderItems;
use App\Models\UsePromoCode;
use Illuminate\Http\Request;
use App\Models\CouponCollect;
use App\Models\UserPromoCode;
use App\Models\ProductEnquiry;
use App\Models\ProductVariation;
use App\Models\ProductEnquiryForm;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Stichoza\GoogleTranslate\GoogleTranslate;

class OrderRepo
{
    public function getOrders($request)
    {
        $orders      = $this->orderData($request);
        $datatables = DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('no', function ($orders) {
                return '';
            })->editColumn('stripe_payment_id', function ($orders) {
                $stripe_payment_id  = $orders->stripe_payment_id;
                return $stripe_payment_id;
            })->editColumn('first_name', function ($orders) {
                $first_name  = $orders->first_name;
                return $first_name;
            })->editColumn('invoice_no', function ($orders) {
                $invoice_no  = $orders->invoice_no;
                return $invoice_no;
            })->editColumn('grand_total', function ($orders) {
                $grand_total  = $orders->grand_total;

                return $grand_total;
            })
            ->editColumn('cancel_status', function ($orders) {
                $cancel_status = '<span class="badge bg-primary" style="padding:5px 8px;">Inactive</span>';
                foreach($orders->orderItems as $data) {
                    if($data->order_status == 6) {
                        $cancel_status = '<span class="badge bg-danger" style="padding:5px 8px;">Active</span>';
                    }
                    break;
                }
                return $cancel_status;
            })
            ->editColumn('cancel_items_qty', function ($orders) {
                $cancel_items_qty = 0;
                foreach($orders->orderItems as $data) {
                    if($data->order_status == 6) {
                        $cancel_items_qty +=1; 
                    }
                }
                $cancel_items_qty_content = "<span class=\"badge bg-danger\" style=\"padding:5px 8px;\">".$cancel_items_qty."</span>";
                return $cancel_items_qty_content;
            })
            ->editColumn('payment_status', function ($orders) {
                $payment_status = '';

                if ($orders->payment_status == 1) {
                    $payment_status .= '<span class="badge bg-success" style="padding:5px 8px;">Success (online payment)</span>';
                } else if($orders->payment_status == 2) {
                    $payment_status .= '<span class="badge bg-primary" style="padding:5px 8px;">Pending (other payment/ offline)</span>';
                }else if($orders->payment_status == 3){
                    $payment_status .= '<span class="badge bg-primary" style="padding:5px 8px;">Processing (other payment/ offline)</span>';
                }else if($orders->payment_status == 4){
                    $payment_status .= '<span class="badge bg-danger" style="padding:5px 8px;">Reject (other payment/ offline)</span>';
                }else if($orders->payment_status == 6){
                    $payment_status .= '<span class="badge bg-danger" style="padding:5px 8px;">Cancel</span>';
                }else{
                    $payment_status .= '<span class="badge bg-success" style="padding:5px 8px;">Success (other payment/ offline)</span>';
                }
                return $payment_status;
            })
            ->editColumn('edit_items_qty', function ($orders) {
                $edit_items_qty = 0;
                foreach($orders->orderItems as $data) {
                  $recipient =  Recipient::where("id",$data->recipient_id)->first();
                    if($recipient) {
                        if($recipient->edit_time==1 || $recipient->edit_location==1 || $recipient->edit_date==1) {
                            $edit_items_qty +=1;
                        }
                    }
                }
                $edit_items_qty_content = "<span class=\"badge bg-danger\" style=\"padding:5px 8px;\">".$edit_items_qty."</span>";
                return $edit_items_qty_content;
            })
            ->addColumn('action', function ($orders) {
                $btn  = '';
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('orders.show', $orders->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="bi bi-eye" aria-hidden="true"></i>
                            </a>
                        </div>';

                return "<div class='action-column'>" . $btn . "</div>";
            })->rawColumns(['stripe_payment_id','first_name','invoice_no', 'grand_total', 'cancel_status','cancel_items_qty','payment_status','edit_items_qty','action']);
        return $datatables->make(true);
    }

    public function orderData($request)
    {
        $search   = $request->search;
        $status   = $request->status;

        $data     = Order::orderBy('id', 'DESC');

        if ($search) {
            $data->Where('invoice_no', 'LIKE', "%$search%");
        }

        if (isset($status) && $status != 'all') {
            $data->where('payment_status', $status);
        }

        return $data->get();
    }


    public function getOrder($id)
    {
        $order = Order::findOrFail($id);

        return $order;
    }

    function saveCheckoutOrders($checkoutItems){
        $customer = Auth::guard('customer')->user();
        $summaryData = (object)$checkoutItems['summaryData'];
        $cardType = (object)$checkoutItems['cardType'];
        // if(isset($summaryData->codeType) && $summaryData->codeType = 'coupon'){
            
        // }
        // if(isset($summaryData->codeType) && $summaryData->codeType = 'coupon'){

        // }
        $date = Carbon::now()->format('ymd');
        if(isset($summaryData->discount_type) && $summaryData->discount_type == 'percent'){
            $price = round((($summaryData->totalAmount) / 100) * $summaryData->codePrice, 0);
            $total = $summaryData->totalAmount - $price;
        }else{
            if(isset($summaryData->codePrice) && $summaryData->codePrice > $summaryData->totalAmount){
                $total = 0;
            }else{
                $total = $summaryData->totalAmount - $summaryData->codePrice;
            }
        }
        $orderNumber = Session::get('customer_phone');
        $order = Order::create([
            'invoice_no' => $date.random_int(10000, 99999),
            'customer_id' => $customer->id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'phone' => isset($orderNumber) ? $orderNumber : $customer->phone,
            'coupon_id' => isset($summaryData->codeType) && isset($summaryData->codeId) && $summaryData->codeType  == 'coupon_code' ? $summaryData->codeId : null,
            'sub_total' =>  $summaryData->totalAmount ?? '',
            'grand_total' =>  $total ?? '',
            'coupon_amount' => isset($summaryData->codeType)  && isset($summaryData->codePrice) && $summaryData->codeType == 'coupon_code' ?  $summaryData->codePrice : '',
            'promo_code_id' => isset($summaryData->codeType)  && isset($summaryData->codeId) && $summaryData->codeType == 'promo_code' ? $summaryData->codeId : null,
            'promo_code_amount' => isset($summaryData->codeType)  && isset($summaryData->codePrice) && $summaryData->codeType == 'promo_code' ? $summaryData->codePrice : '',
            'payment_status' => $checkoutItems['cardType'] == 'other_pay' ? 2 : 1,
            'payment_type' => $checkoutItems['cardType'],
        ]);
        if(count($checkoutItems['recipientData']) > 0){
            foreach($checkoutItems['recipientData'] as $key => $item){
                // $lastId = OrderItems::latest()->first();
                if($item->variable_id != null){
                    $isDisProduct = isset($item->variable_product->promotion_price) ? $item->variable_product->promotion_price : (isset($item->variable_product->discount_price) ? $item->variable_product->discount_price : $item->variable_product->original_price);
                    $disAmount = isset($isDisProduct) && $item->each_recipient_amount != null ? $item->variable_product->original_price - $isDisProduct : 0;
                }else{
                    $isDisProduct = isset($item->product->promotion_price) ? $item->product->promotion_price : (isset($item->product->discount_price) ? $item->product->discount_price : $item->product->original_price);
                    $disAmount = isset($isDisProduct) && $item->each_recipient_amount != null ? $item->product->original_price - $isDisProduct : 0;
                }
                $code = sprintf("%'.03d", $key+1).PHP_EOL;
                $oitem = OrderItems::create([
                    'orders_id' => $order->id,
                    'recipient_id' => $item->id,
                    'product_id' => $item->product_id,
                    'variable_id' => $item->variable_id ?? null,
                    'booking_id' => $order->invoice_no.'-'.$code,
                    'order_status' =>  $checkoutItems['cardType'] == 'other_pay' ? 1 : 2,
                    'sku' => isset($item->variable_id) ? $item->variable_product->sku : $item->product->sku,
                    'discount_amount' => $disAmount,
                    'price' => $item->each_recipient_amount,
                    'total' => $item->each_recipient_amount + $item->add_on_prices,
                ]);
                if($item->variable_id !== null){
                    $variableProduct = ProductVariation::where('id',$item->variable_id)->first();
                    $variableProduct->update([
                        'stock' => $variableProduct->stock -= 1
                    ]);
                }else{
                    $product = Product::where('id',$item->product_id)->first();
                    $product->update([
                        'stock' => $product->stock -= 1
                    ]);
                }

                Recipient::where('id',$item->id)->update(['is_ordered_checkout' => true]);
            }
        }
        if(isset($order->coupon_id)){
            $collectCoupon = CouponCollect::where('customer_id',$customer->id)->where('coupon_id',$order->coupon_id)->first();
            $collectCoupon->update([
                'limit_pickup_day' => $collectCoupon->limit_pickup_day += 1,
                'limit_per_member' => $collectCoupon->limit_per_member += 1
            ]);
            $coupon = Coupon::where('id',$order->coupon_id)->first();
            $coupon->update(['total_used_member' => $coupon->total_used_member +=1 ]);
            
            if($coupon->coupon_type !== null){
                if($coupon->coupon_type === 0){
                    $couponId = Coupon::whereIsPublished(true)->where('coupon_type',0)->pluck('id')->toArray();
                }
                if($coupon->coupon_type === 1){
                    $couponId = Coupon::whereIsPublished(true)->where('coupon_type',1)->pluck('id')->toArray();
                }
                CouponCollect::where('customer_id',$customer->id)->whereIn('coupon_id',$couponId)->update([
                    'is_available' => 0
                ]);
            }
        }

        if(isset($order->promo_code_id)){
            $promoCode = PromoCode::where('id',$order->promo_code_id)->first();
            if($promoCode != null){
                UsePromoCode::create([
                    'customer_id' => $customer->id,
                    'promo_code_id' => $promoCode->id,
                ]);
            }

            if($promoCode != null){
                $userProCode = UserPromoCode::where('customer_id',$customer->id)->where('promo_code_id',$promoCode->id)->first();
                if($userProCode != null){
                    $userProCode->update([
                        'customer_id' => $customer->id,
                        'promo_code_id' => $promoCode->id,
                        'use_count' =>  $userProCode->use_count +=1,
                    ]);
                }else{
                    UserPromoCode::create([
                        'customer_id' => $customer->id,
                        'promo_code_id' => $promoCode->id,
                        'use_count' => 1,
                    ]);
                }
            }
        }
        Cart::where('customer_id',$customer->id)->delete();
        return $order;

    }

    function getEnquiryOrders($request){
        $search   = $request->search;
        $enquiryProduct     = ProductEnquiry::orderBy('id', 'DESC')
        ->where('enquiry_invoice_no', 'LIKE', "%$search%")
        ->get();
        $datatables = DataTables::of($enquiryProduct)
            ->addIndexColumn()
            ->addColumn('no', function ($enquiryProduct) {
                return '';
           
            })
            ->editColumn('customer_name', function ($enquiryProduct) {
                
                return $enquiryProduct->customer->first_name.' '.$enquiryProduct->customer->last_name;
            })
            ->editColumn('product_name', function ($enquiryProduct) {
                return $enquiryProduct->product->name_en;
            })
            ->addColumn('action', function ($enquiryProduct) {
                $btn  = '';
                $btn .= '<div class="d-flex justify-content-center flex-shrink-0">
                            <a href="' . route('enquiry.enquiryProductShow', $enquiryProduct->id) . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="bi bi-eye" aria-hidden="true"></i>
                            </a>
                        </div>';

                return "<div class='action-column'>" . $btn . "</div>";
            })->rawColumns(['customer_name','product_name','action']);
        return $datatables->make(true);
    }

}
