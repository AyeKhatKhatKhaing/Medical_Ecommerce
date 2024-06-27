<?php

namespace App\Mail;

use App\Models\BillingInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Territory;
use App\Models\District;
class GeneralMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        if(config('app.env') == 'production'){
            $bccMails = ['cs@mediq.com.hk'];
        }else{
            $bccMails = ['visibleone.pearl@gmail.com'];
        }
        if(isset($this->data['customerInfo']['order_processing_mail'])){
            if($this->data['card_type'] != 'other_pay'){
                $customerInfo = Customer::find($this->data['customerInfo']['id']);
                //$address = ($customerInfo->address!=null?$customerInfo->address.',<br/>':''). ($customerInfo->district_id!==null?$customerInfo->district->name_en.',':'').($customerInfo->area_id!=null?$customerInfo->area->name_en.',':'').'HONG KONG';
                $checkOrderDetails = Order::where("id",$this->data['order']['id'])->first();
                $recipientIds = OrderItems::where("orders_id",$this->data['order']['id'])->pluck("recipient_id")->toArray();
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
                $customerData = [
                    'email' => $customerInfo->email,
                    'name' => $customerInfo->first_name .' '. $customerInfo->last_name,
                    'card_type' => $checkOrderDetails->payment_type,
                    'order_processing_mail' => 'order_processing_mail',
                    //'address' => $address,
                    'order_no' => $checkOrderDetails->invoice_no,
                    'order_date' => $checkOrderDetails->created_at,
                    'total_amount' => $checkOrderDetails->grand_total,
                    'customer_id' => $customerInfo->id,
                    'coupon_price'=>$coupon_price,
                    'coupon_discount_type'=>$coupon_discount_type,
                    'coupon_type'=>$coupon_type,
                    'sub_total'=>$checkOrderDetails->grand_total+$coupon_price,
                    'recipientIds'=> $recipientIds,
                    'card_name' => $checkOrderDetails->card_name,
                    'billing_customer_name' => $this->data['customerInfo']['billing_customer_name'],
                    'billing_customer_address' => $this->data['customerInfo']['billing_customer_address']
                ];
                $customerDataPdf = [];
                $customerDataPdf['customerInfo'] = $customerData;
                $customerDataPdf['order'] = $checkOrderDetails;
                ini_set('memory_limit', '512M');
                set_time_limit(120);
                $pdf = Pdf::loadView('pdf.ereceipt',['data'=>$customerDataPdf])->setPaper("A4", "portrait"); //load view page
                return $this->bcc($bccMails)->subject(trans('labels.general_mail.booking_confirmation').' '.'('.trans('labels.check_out.order_number').' '.'#' .$this->data['order']->invoice_no.')')->view('email.orders.order-confirmation')
                 ->with("data" ,$this->data)
                 ->attachData($pdf->output(), trans('labels.email.ereceipt').'.pdf', [
                    'mime' => 'application/pdf',
                ]);
            }else{
                return $this->bcc($bccMails)->subject(trans('labels.general_mail.booking_confirmation').' '.'('.trans('labels.check_out.order_number').' '.'#' .$this->data['order']->invoice_no.')')->view('email.orders.order-confirmation')
                 ->with("data" ,$this->data);
            }
        }

        if(isset($this->data['welcome_reg'])){
            return $this->subject(trans('labels.email.health_partner'))->view('email.account-reg')
            ->with("data" ,$this->data);
        }

        if(isset($this->data['birthday_coupon'])){
            return $this->subject(trans('labels.email.b_coupon_subject'))->view('email.birthday_coupon')
            ->with("data" ,$this->data);
        }

        if(isset($this->data['activate_account'])){
            return $this->subject(trans('labels.email.activate_you_acc_now'))->view('email.account-activate')
            ->with("data" ,$this->data);
        }

        if(isset($this->data['order_confirmation'])){
            if($this->data['order_status']==3) {
            return $this->bcc($bccMails)->subject($this->data['email_title'])->view('email.orders.booking-confirm')
            ->with("data" ,$this->data);
            }
            if($this->data['order_status']==6) {
                return $this->bcc($bccMails)->subject($this->data['email_title'])->view('email.orders.booking-cancel')
                ->with("data" ,$this->data);
            }
            if($this->data['order_status']==7) {
                return $this->bcc($bccMails)->subject($this->data['email_title'])->view('email.orders.booking-refund')
                ->with("data" ,$this->data);
            }

        }

        if(isset($this->data['reset_pw'])){
            return $this->subject(trans('labels.email.reset_pwd_subject').$this->data['code'] )->view('email.email_pw_reset')
            ->with("data" ,$this->data);
        }

        if(isset($this->data['payslip_information'])){
            if($this->data['payment_status']==5) {
                $customerInfo = Customer::find($this->data['customer_id']);
                //$address = ($customerInfo->address!=null?$customerInfo->address.',<br/>':''). ($customerInfo->district_id!==null?$customerInfo->district->name_en.',':'').($customerInfo->area_id!=null?$customerInfo->area->name_en.',':'').'HONG KONG';
                $checkOrderDetails = Order::where("id",$this->data['order_id'])->first();
                $recipientIds = OrderItems::where("orders_id",$this->data['order_id'])->pluck("recipient_id")->toArray();
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
                $billing_customer_name = "";
                $billing_customer_address = "";
                $billingInfo = BillingInfo::where("order_id",$this->data['order_id'])->first();
                if(isset($billingInfo)) {
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
                }
                $billing_customer_address .= "HONG KONG";
                $customerData = [
                    'email' => $customerInfo->email,
                    'name' => $customerInfo->first_name .' '. $customerInfo->last_name,
                    'card_type' => $checkOrderDetails->payment_type,
                    'order_processing_mail' => 'order_processing_mail',
                    //'address' => $address,
                    'order_no' => $checkOrderDetails->invoice_no,
                    'order_date' => $checkOrderDetails->created_at,
                    'total_amount' => $checkOrderDetails->grand_total,
                    'customer_id' => $customerInfo->id,
                    'coupon_price'=>$coupon_price,
                    'coupon_discount_type'=>$coupon_discount_type,
                    'coupon_type'=>$coupon_type,
                    'sub_total'=>$checkOrderDetails->grand_total+$coupon_price,
                    'recipientIds'=> $recipientIds,
                    'card_name' => $checkOrderDetails->card_name,
                    'billing_customer_name' => $billing_customer_name,
                    'billing_customer_address' => $billing_customer_address,
                    'payment_status' => $checkOrderDetails->payment_status,
                    'payment_method' => $checkOrderDetails->payment_method,
                ];
                $customerDataPdf = [];
                $customerDataPdf['customerInfo'] = $customerData;
                $customerDataPdf['order'] = $checkOrderDetails;
                ini_set('memory_limit', '512M');
                set_time_limit(120);
                $pdf = Pdf::loadView('pdf.ereceipt',['data'=>$customerDataPdf])->setPaper("A4", "portrait"); //load view page
                return $this->bcc($bccMails)->subject($this->data['emailTitle'])->view('email.orders.payment-success')
                        ->with("data" ,$this->data)
                        ->attachData($pdf->output(), trans('labels.email.ereceipt').'.pdf', [
                            'mime' => 'application/pdf',
                        ]);
            }
            if($this->data['payment_status']==4) {
                return $this->bcc($bccMails)->subject($this->data['emailTitle'])->view('email.orders.payment-reject')
                ->with("data" ,$this->data);
            }
        }

        if(isset($this->data['customerInfo']['order_ereceipt_mail'])){
                $customerInfo = Customer::find($this->data['customerInfo']['customer_id']);
                //$address = ($customerInfo->address!=null?$customerInfo->address.',<br/>':''). ($customerInfo->district_id!==null?$customerInfo->district->name_en.',':'').($customerInfo->area_id!=null?$customerInfo->area->name_en.',':'').'HONG KONG';
                $checkOrderDetails = Order::where("id",$this->data['order']['id'])->first();
                $recipientIds = OrderItems::where("orders_id",$this->data['order']['id'])->pluck("recipient_id")->toArray();
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
                $billing_customer_name = "";
                $billing_customer_address = "";
                $billingInfo = BillingInfo::where("order_id",$this->data['order']['id'])->first();
                if(isset($billingInfo)) {
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
                }else{
                    $billing_customer_name = $this->data['customerInfo']['name'];
                    if(isset($this->data['customerInfo']['postal_address'])) {
                        $billing_customer_address .= $this->data['customerInfo']['postal_address'].", ";
                    }   
                }
                $billing_customer_address .= "HONG KONG";
                $customerData = [
                    'email' => $customerInfo->email,
                    'name' => $customerInfo->first_name .' '. $customerInfo->last_name,
                    'card_type' => $checkOrderDetails->payment_type,
                    'order_processing_mail' => 'order_processing_mail',
                    //'address' => $address,
                    'order_no' => $checkOrderDetails->invoice_no,
                    'order_date' => $checkOrderDetails->created_at,
                    'total_amount' => $checkOrderDetails->grand_total,
                    'customer_id' => $customerInfo->id,
                    'coupon_price'=>$coupon_price,
                    'coupon_discount_type'=>$coupon_discount_type,
                    'coupon_type'=>$coupon_type,
                    'sub_total'=>$checkOrderDetails->grand_total+$coupon_price,
                    'recipientIds'=> $recipientIds,
                    'card_name' => $checkOrderDetails->card_name,
                    'billing_customer_name'=>$billing_customer_name,
                    'billing_customer_address'=>$billing_customer_address
                ];
                $customerDataPdf = [];
                $customerDataPdf['customerInfo'] = $customerData;
                $customerDataPdf['order'] = $checkOrderDetails;
                ini_set('memory_limit', '512M');
                set_time_limit(120);
                $pdf = Pdf::loadView('pdf.ereceipt',['data'=>$customerDataPdf])->setPaper("A4", "portrait"); //load view page
                return $this->bcc($bccMails)->subject(trans('labels.email.e_receipt_title').$this->data['customerInfo']['invoice_no'].")")->view('email.orders.ereceipt')
                ->with("data" ,$this->data)
                ->attachData($pdf->output(), trans('labels.email.ereceipt').'.pdf', [
                    'mime' => 'application/pdf',
                ]);
        }
    }
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'General Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     return [];
    // }
}
