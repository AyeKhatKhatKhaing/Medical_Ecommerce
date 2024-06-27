<?php

namespace App\Http\Controllers\Admin;

use Stripe\Refund;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Mail\GeneralMail;
use App\Models\Recipient;
use App\Models\OrderItems;
use App\Models\BillingInfo;
use Illuminate\Http\Request;
use App\Models\RecipientItem;
use App\Models\ProductEnquiry;
use App\Repositories\OrderRepo;
use App\Models\MerchantLocation;
use App\Models\NotificationType;
use App\Models\ProductEnquiryForm;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CustomerNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\District;
use App\Models\Territory;
use App\Models\SeoPage;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page  =  'orders';

    protected $OrderRepo;

    public function __construct(OrderRepo $OrderRepo)
    {
        $this->middleware('role:admin,manager,marketing,accounting,customer-support');
        $this->OrderRepo = $OrderRepo;
    }

    public function index()
    {
        $page         = $this->page;
        return view('admin.order.index', compact('page'));
    }
    public function getData(Request $request)
    {
        return $this->OrderRepo->getOrders($request);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $billing = BillingInfo::where('order_id', $id)->first();

        $order_item = OrderItems::select('order_items.*', 'products.is_two_recipient')
            ->Join('products', function ($join) {
                return $join->on('products.id', '=', 'order_items.product_id');
            })
            ->where('orders_id', $id)
            ->get();
        // dd($order_item);
        $order_items = array();
        $duplicates_to_remove = 0;

        // Count the items with is_two_recipient equal to 1
        foreach ($order_item as $item) {
            if ($item->is_two_recipient == 1) {
                $duplicates_to_remove++;
            }
        }

        // Determine the number of duplicates to remove
        $duplicates_to_remove = intdiv($duplicates_to_remove, 2);

        // Array to store the frequency of product_id and is_two_recipient combination
        $product_counts = array();

        foreach ($order_item as $val) {
            // Skip non-duplicate items or if required duplicates are already removed
            if ($val->is_two_recipient != 1 || $duplicates_to_remove <= 0) {
                $order_items[] = $val;
                continue;
            }

            // Increment count for the specific product_id and is_two_recipient combination
            $key = $val->product_id . '_' . $val->is_two_recipient;
            if (!isset($product_counts[$key])) {
                $product_counts[$key] = 0;
            }

            // Check if the count has reached the limit
            if ($product_counts[$key] < $duplicates_to_remove) {
                $order_items[] = $val;
                $product_counts[$key]++;
            }
        }
        //  dd($order_items, $order_item);


        $recipients = Recipient::select('recipients.*')
            ->Join('order_items', function ($join) {
                return $join->on('recipients.id', '=', 'order_items.recipient_id');
            })
            ->where('order_items.orders_id', $id)
            ->orderBy('recipients.id')
            ->get();

        $productRecipientsMap = [];
        foreach ($recipients as $recipient) {
            $productRecipientsMap[$recipient->product_id][] = $recipient;
        }

        foreach ($order_items as $key => $item) {
            $product_id = $item->product_id;
            if (isset($productRecipientsMap[$product_id])) {
                $order_items[$key]['recipients'] = $productRecipientsMap[$product_id];
            } else {
                $order_items[$key]['recipients'] = [];
            }
        }
        $splitArray = [];
        $i = 0;
        foreach ($order_items as $key => $item) {
            $recipient_id = $item->recipient_id;
            // $recipients = $item->recipients;
            // dd(count($recipients));
            if ($item->is_two_recipient == 1) {
                // dd($item->recipients);
                $recipients = array_chunk($item->recipients, 2);

                $item->recipients = isset($recipients[$i]) ? $recipients[$i] : [];
                $splitArray[] = $item;
                $i++;
                // $order_items[$key]->recipients = $order_items[$key]->recipients;
            } else {
                $filteredColumn = array_filter($item->recipients, function ($value) use ($recipient_id) {
                    return $value->id == $recipient_id;
                });
                // Assuming $order_items[$key] is an object
                $order_items[$key]->recipients = array_values($filteredColumn); // Reset array keys
            }
        }

        return view('admin.order.show', compact('order', 'order_items', 'billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveOrderItemStatus(Request $request)
    {
        if(isset($request['order_item_id']) && isset($request['recipient_id'])) {
            OrderItems::where('id', $request['order_item_id'])->update([
                'order_status' => $request['order_status']
            ]);
            $orderItem = OrderItems::where('id', $request['order_item_id'])->first();
            $orderInfo = Order::find($orderItem->orders_id);
            if($request['order_status'] == 7) {
                $stripe_secret_key = config('app.stripe_secret') ;
                Stripe::setApiKey($stripe_secret_key);
                OrderItems::where('id', $request['order_item_id'])->update([
                    'refund_amount' => $request['refundAmount']
                ]);
                if($orderInfo->stripe_payment_id != null) {
                    Refund::create([
                        'charge' => $orderInfo->stripe_payment_id,
                        'amount' => str_replace(".", "", number_format($request['refundAmount'], 2, '.', '')),
                        'reason' => 'requested_by_customer'
                    ]);
                }
            }
            if(isset($request['date']) && isset($request['time'])) {
                Recipient::where('id', $request['recipient_id'])->update([
                    'confirm_booking_date' => $request['date'],
                    'confirm_booking_time' => $request['time'],
                    'confirm_location' => $request['confirm_location'],
                ]);
            }

            $recipient = Recipient::where('id', $request['recipient_id'])->first();
            $customer = Customer::where('id', $recipient->customer_id)->first();
            $location = MerchantLocation::where('area_id', $recipient->confirm_location)->where('merchant_id', $recipient->product->merchant->id)->first();
            $customerNotificationLang = CustomerNotification::where("customer_id", $recipient->customer_id)
                                                            ->where("custom_notification_id", 4)
                                                            ->first();
            $defaultLang = "zh-hk";
            if($customerNotificationLang) {
                $defaultLang = NotificationType::where("id", $customerNotificationLang->notification_type_id)->first()->name_en;
            }
            if($request['order_status'] == 1) {
                if($defaultLang == "en") {
                    $statusText = "is waiting for payment";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "正在等待付款";
                } else {
                    $statusText = "正在等待付款";
                }
            }
            if($request['order_status'] == 2) {
                if($defaultLang == "en") {
                    $statusText = "is waiting for confirmation";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "正在等待確認";
                } else {
                    $statusText = "正在等待确认";
                }
            }
            if($request['order_status'] == 3) {
                if($defaultLang == "en") {
                    $statusText = "is confirmed";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "已確認";
                } else {
                    $statusText = "已确认";
                }
            }
            if($request['order_status'] == 4) {
                if($defaultLang == "en") {
                    $statusText = "is completed";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "完成了";
                } else {
                    $statusText = "完成了";
                }
            }
            if($request['order_status'] == 5) {
                if($defaultLang == "en") {
                    $statusText = "is expired";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "已過期";
                } else {
                    $statusText = "已过期";
                }
            }
            if($request['order_status'] == 6) {
                if($defaultLang == "en") {
                    $statusText = "is cancelled";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "已取消";
                } else {
                    $statusText = "已取消";
                }
            }
            if($request['order_status'] == 7) {
                if($defaultLang == "en") {
                    $statusText = "is refunded";
                } elseif($defaultLang == "zh-hk") {
                    $statusText = "已退款";
                } else {
                    $statusText = "已退款";
                }
            }
            if($defaultLang == "en") {
                $emailTitle = "Your Booking Confirmed (Booking ID #" .$orderItem->booking_id .")";
                if($request['order_status'] == 6) {
                    $emailTitle = "Your Order Cancellation Confirmed (Order Number #".$orderInfo->invoice_no .")";
                }
                if($request['order_status'] == 7) {
                    $emailTitle = "Your Order Has Been Refunded (Order Number #".$orderInfo->invoice_no .")";
                }
            } elseif($defaultLang == "zh-hk") {
                $emailTitle = "您的預約已確認 (預約參考編號 " .$orderItem->booking_id .")";
                if($request['order_status'] == 6) {
                    $emailTitle = "您的訂單已取消 (訂單編號 #" .$orderInfo->invoice_no .")";
                }
                if($request['order_status'] == 7) {
                    $emailTitle = "您的訂單已退款 (訂單編號 #" .$orderInfo->invoice_no .")";
                }
            } else {
                $emailTitle = "您的预约已确认 (预约参考编号 " .$orderItem->booking_id .")";
                if($request['order_status'] == 6) {
                    $emailTitle = "您的订单已取消 (订单编号 #" .$orderInfo->invoice_no .")";
                }
                if($request['order_status'] == 7) {
                    $emailTitle = "您的订单已退款 (订单编号 #" .$orderInfo->invoice_no .")";
                }
            }
            $data = [
                'email' => $customer->email,
                'name' => $customer->first_name,
                'orderItem' => $orderItem,
                'recipient' => $recipient,
                'location' => $defaultLang === 'en' ? (isset($location->full_address_en) ? $location->full_address_en : '') : ($defaultLang === 'zh-cn' ? (isset($location->full_address_sc) ? $location->full_address_sc : '') : (isset($location->full_address_tc) ? $location->full_address_tc : '')),
                'order_confirmation' => 'order_confirmation',
                'order_status' => $request['order_status'],
                'default_lang' => $defaultLang,
                'status_text' =>  $statusText,
                'email_title' =>  $emailTitle,
                'payment_type' => $orderInfo->payment_type,
                'invoice_no' =>  $orderInfo->invoice_no
            ];
            if($request['order_status'] == 3 || $request['order_status'] == 6 || $request['order_status'] == 7) {
                Mail::to($data['email'])->locale("$defaultLang")->send(new GeneralMail($data));
            }
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 'fail']);
        }

    }

    public function savePaymentStatus(Request $request)
    {
        if(isset($request['order_id']) && isset($request['payment_status'])) {
            $order = Order::find($request['order_id']);
            $order->payment_status = $request['payment_status'];
            $order->payment_method = $request['payment_method'];
            $order->save();
            // payment offline payment status success
            if($order->payment_status == 5) {
                $orderItems = OrderItems::where("orders_id", $request['order_id'])->get();
                foreach($orderItems as $data) {
                    // check order status for Pending (waiting for payment)
                    if($data->order_status == 1) {
                        // change order status for Pending (waiting for confirmation)
                        $data->order_status = 2;
                        $data->save();
                    }
                }
            }
            if($order->payment_status == 6) {
                OrderItems::where("orders_id", $request['order_id'])->update(["order_status" => 6]);
            }
            $customer = Customer::where('id', $order->customer_id)->first();
            $customerNotificationLang = CustomerNotification::where("customer_id", $order->customer_id)
                                                            ->where("custom_notification_id", 4)
                                                            ->first();
            $defaultLang = "zh-hk";
            if($customerNotificationLang) {
                $defaultLang = NotificationType::where("id", $customerNotificationLang->notification_type_id)->first()->name_en;
            }
            // Payment Success
            if($order->payment_status == 5) {
                if($defaultLang == "en") {
                    $emailTitle = "Payment Successful for Your Order (Order Number #".$order->invoice_no.")";
                } elseif($defaultLang == "zh-hk") {
                    $emailTitle = "您的訂單付款成功 (訂單編號 #".$order->invoice_no.")";
                } else {
                    $emailTitle = "您的订单付款成功 (订单编号 #".$order->invoice_no.")";
                }
            }
            // Payment Reject
            if($order->payment_status == 4) {
                if($defaultLang == "en") {
                    $emailTitle = "Payment Incomplete for Your Order (Order Number #".$order->invoice_no.")";
                } elseif($defaultLang == "zh-hk") {
                    $emailTitle = "您的訂單付款未完成 (訂單編號 #".$order->invoice_no.")";
                } else {
                    $emailTitle = "您的订单付款未完成 (订单编号 #".$order->invoice_no.")";
                }
            }

            if($order->payment_status == 4 || $order->payment_status == 5) {
                $data = [
                    'email' => $customer->email,
                    'name' => $customer->first_name,
                    //'payment_status' => config('mediq.payment_status_en')[$order->payment_status],
                    'payslip_information' => 'payslip_information',
                    'invoice_no' => $order->invoice_no,
                    'payment_status' => $request['payment_status'],
                    'emailTitle' => $emailTitle,
                    'default_lang' => $defaultLang,
                    'order_id' => $order->id,
                    'customer_id' => $order->customer_id
                ];
                Mail::to($data['email'])->locale("$defaultLang")->send(new GeneralMail($data));
            }
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 'fail']);
        }

    }

    public function enquiryProduct()
    {
        return view('admin.enquiry_products.index');
    }

    public function getEnquiryData(Request $request)
    {
        return $this->OrderRepo->getEnquiryOrders($request);
    }

    public function enquiryProductShow(Request $request, $id)
    {
        $enquiryProduct = ProductEnquiry::orderBy('id', 'DESC')->where('id', $id)->first();
        if(!$enquiryProduct) {
            abort(404);
        }
        return view('admin.enquiry_products.detail', compact('enquiryProduct'));
    }

    public function changeOrderOptionalItems(Request $request)
    {
        $recipient_id   = $request->recipient_id;
        $group_id   = $request->group_id;
        $product_id   = $request->product_id;
        $check_up_item_id   = $request->check_up_item_id;
        $item_ids = RecipientItem::where('check_up_group_id', $group_id)
                                    ->where('recipient_id', $recipient_id)
                                    ->where('product_id', $product_id)
                                    ->get();
        foreach($item_ids as $oldData) {
            $oldData->delete();
        }
        if($check_up_item_id != null && count($check_up_item_id) > 0) {
            foreach($check_up_item_id as $newData) {
                $newRecipientItem = new RecipientItem();
                $newRecipientItem->check_up_group_id = $group_id;
                $newRecipientItem->recipient_id = $recipient_id;
                $newRecipientItem->product_id = $product_id;
                $newRecipientItem->check_up_item_id = $newData;
                $newRecipientItem->save();
            }
        }
        return response()->json(['status' => 200]);

    }

    public function download($id)
    {
        $orderDetails = Order::where("id", $id)->first();

        $customer = Customer::find($orderDetails->customer_id);
        $billingInfo = BillingInfo::where("order_id", $id)->first();
        $billing_customer_name = "";
        $billing_customer_address = "";
        if($billingInfo) {
            $billing_customer_name = $billingInfo->name;
            if(isset($billingInfo->address)) {
                $billing_customer_address .= "$billingInfo->address, ";
            }
            if(isset($billingInfo->district_id)) {
                $districts = District::find($billingInfo->district_id);
                $billing_customer_address .= "$districts->name_en, ";
            }
            if(isset($billingInfo->territory_id)) {
                $territory = Territory::find($billingInfo->territory_id);
                $billing_customer_address .= "$territory->name_en, ";
            }
            $billing_customer_address .= "HONG KONG";
        }

        $coupon_type = "coupon";
        $coupon_price = 0;
        $coupon_discount_type = "amount";
        if($orderDetails->coupon_id != null) {
            $coupon_price = $orderDetails->coupon_amount;
            $coupon_discount_type = $orderDetails->coupon->discount_type;
        }
        if($orderDetails->promo_code_id != null) {
            $coupon_price = $orderDetails->promo_code_amount;
            $coupon_type = "promo";
        }
        $recipientIds = OrderItems::where("orders_id", $id)->pluck("recipient_id")->toArray();
        $customerInfo = [
            'email' => $customer->email,
            'name' => $customer->first_name .' '. $customer->last_name,
            'card_type' => $orderDetails->payment_type,
            'order_processing_mail' => 'order_processing_mail',
            'order_no' => $orderDetails->invoice_no,
            'order_date' => $orderDetails->created_at,
            'total_amount' => $orderDetails->grand_total,
            'customer_id' => $customer->id,
            'coupon_price' => $coupon_price,
            'coupon_discount_type' => $coupon_discount_type,
            'coupon_type' => $coupon_type,
            'sub_total' => $orderDetails->grand_total + $coupon_price,
            'recipientIds' => $recipientIds,
            'card_name' => $orderDetails->card_name,
            'billing_customer_name' => $billing_customer_name,
            'billing_customer_address' => $billing_customer_address,
        ];
        $data = [];
        $data['print'] = 'yes';
        $data['order'] = $orderDetails;
        $data['customerInfo'] = $customerInfo;
        $data['seo'] = SeoPage::where("title", "my_booking_details")->first();
        foreach($orderDetails->orderItems as $key => $item) {
            if($item->recipient->product->is_two_recipient == false) {
                $data['sample'][$key] = $item;
            }
            if($item->recipient->product->is_two_recipient == true) {
                $data['two_person_plan'][$key] = $item;
            }
        }
        // $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('pdf.ereceipt', ['data' => $data])->setPaper("A4", "portrait"); //load view page
        //$pdf = PDF::loadView('pdf.ereceipt',['data'=>$data]);
        return $pdf->download('pdfview.pdf');
    }


}
