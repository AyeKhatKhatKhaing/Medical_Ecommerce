<?php

namespace App\Services;

use Config;
use Stripe;
use Exception;
use Validator;
use Stripe\Token;
use Stripe\Charge;
use App\Models\StripeCustomer;
use App\Repositories\OrderRepo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class StripeService
{
    // private $generalSettingRepo;

    // public function __construct() {

    //     $this->generalSettingRepo     = new GeneralSettingRepo;

    // }

    function payment($cardinfo,$checkoutItems) {

        $message['message']     = array();
        $message['data']        = array();
        $message['status_code'] = "404";
        // $get_stripe             = $this->generalSettingRepo->getPaymentTypeBy('stripe');
        $stripe_secret_key      = Config::get('app.stripe_secret');
        // dd($stripe_secret_key);
        // $validator = Validator::make($cardinfo, [
        //     'card_code' => 'required',
        //     'expire_month' => 'required',
        //     'expire_year' => 'required',
        //     'cvv' => 'required'
        // ]);

                
        // if (!$validator->passes()) { 

        //     array_push($message['message'], 'Card fields are required!!');
        //     return $message;

        // }   
        // try {
            // if(!isset($checkoutItems['cus_str_id'])){

            //     $token = Token::create([
            //       'card' => [
            //         'number'    => $cardinfo['card_code'],
            //         'exp_month' => $cardinfo['expire_month'],
            //         'exp_year'  => $cardinfo['expire_year'],
            //         'cvc'       => $cardinfo['cvv'],
            //       ]
            //     ]);
    
            //     if (!isset($token['id'])) {
    
            //         array_push($message['message'], 'Payment Fail:The Stripe Token was not generated correctly');
            //         return $message;
    
            //     }
            // }

            // try { 
                // DB::beginTransaction();
                $stripe = \Stripe\Stripe::setApiKey($stripe_secret_key);
                // dd(Stripe::setApiKey($stripe_secret_key));
                $stripe = new \Stripe\StripeClient($stripe_secret_key);
                $customer = Auth::guard('customer')->user();
                $order = new OrderRepo;
                // dd($checkoutItems['cus_str_id']);
                $order = $order->saveCheckoutOrders($checkoutItems);
                $stripCustomerId = $this->checkCustomerStrip($customer,$cardinfo,$order,$checkoutItems['cus_str_id']);

                $response = $this->getPaymentMethod($stripCustomerId);
                   
                $order->update([
                    'card_name' => $response['brand'] ?? ''
                ]) ;
                // dd($stripCustomerId);
                // $customer_pay = $stripe->customers->create([
                //     'name'=>$order->first_name . " ". $order->last_name,
                //     'email'=>$order->email,
                //     'source'=>$token['id'],
                //     'phone'=>'',
                //     'description' => '',
                // ]);
                // dd($customer_pay);
                
                \Session::put('checkoutOrder',$order);
                if($checkoutItems['saveCard'] != null){
                    $existCustomer = StripeCustomer::where('customer_id',$customer->id)->where('stripe_customer_id',$stripCustomerId)->exists();
                    $number= '';
                    if($cardinfo['card_code'] != null){
                        $number = str_split($cardinfo['card_code'], strlen($cardinfo['card_code'])/4);
                    }
                    if(!$existCustomer){
                        StripeCustomer::create([
                            'customer_id' => $customer->id,
                            'stripe_customer_id' => $stripCustomerId,
                            'digit' => $number[3],
                            'card_type' => $response['brand'] ?? '',
                        ]);
                    }
                }
                $cost = [
                    "amount" =>  str_replace(".", "",number_format($order->grand_total, 2, '.', '')) ?? 0,
                    "currency" => 'HKD',
                    "customer" => $stripCustomerId, // obtained with Stripe.js
                    "description" => "MediQ Id - ". $order->id ." |  Order from : ". $order->first_name . " ". $order->last_name. ". Customer Email - " .$order->customer->email
  
                ];

                $charge = Charge::create($cost);

                if(isset($charge)){
                    if($charge['status'] == 'succeeded') {
                    
                       #save db
                       $payment_id = isset($charge['id'])? $charge['id']:'';

                       $order->update(['stripe_payment_id'=> $payment_id]);

                       $message['data']         = $charge;

                       $message['status_code']  = "200";

                       $message['order'] = $order;
                       
                       $message['brand'] = $response['brand'] ?? '';

                       return $message;

                    } else {

                        array_push($message['message'],'Payment Fail!!');

                        return $message;
                    }
                }
            // DB::commit();
            // } catch (Exception $e) {
            //     array_push($message['message'],'Your card was declined');
            //     return $message;

            // } 

            
        // } catch (Exception $e) {

        //     array_push($message['message'],'Your card was declined');

        //     return $message;

        // } 

    }

   public function checkCustomerStrip($customer,$cardinfo,$order,$cus_str_id)
   {
        $cusStripe = StripeCustomer::where('customer_id',$customer->id)->where('id',$cus_str_id)->first();
        $stripe_secret = Config::get('app.stripe_secret');   
        $stripe = new \Stripe\StripeClient($stripe_secret);
        $stripeToken = $cardinfo['stripeToken'];
        $card_no = $cardinfo['card_code'];
        $expire_month = $cardinfo['expire_month'];
        $expire_year = $cardinfo['expire_year'];
        $card_cvv = $cardinfo['cvv'];
        if($cusStripe != null){
            $stripeapikey = \Stripe\Stripe::setApiKey($stripe_secret);
            // $token = Token::create([
            //     'card' => [
            //         'number'    => $card_no,
            //         'exp_month' => $expire_month,
            //         'exp_year'  => $expire_year,
            //         'cvc'       => $card_cvv,
            //     ]
            //     ]);
            
            //     $response = $stripe->customers->createSource(
            //     $cusStripe->stripe_customer_id,
            //     ['source' => $token['id']],
            //     []
            //     );
                $customers =\Stripe\Customer::retrieve(
                $cusStripe->stripe_customer_id,
                    []
            );
                // $customers->default_source  = $response['id'];
                $customers->save();
                
                // dd($cusStripe);
                return $cusStripe->stripe_customer_id;
            
        }else{
           
            
            // $payment = $stripe->paymentMethods->create([
            //     'type' => 'card',
            //     'card' => [
            //         'number'    => $card_no,
            //         'exp_month' => $expire_month,
            //         'exp_year'  => $expire_year,
            //         'cvc'       => $card_cvv,
            //     ],
            //   ]);
              $stripeapikey = Stripe\Stripe::setApiKey($stripe_secret);
            
            // $hold_response = Token::create([
            //     'card' => [
            //         'number'    => $card_no,
            //         'exp_month' => $expire_month,
            //         'exp_year'  => $expire_year,
            //         'cvc'       => $card_cvv,
            //     ]
            //   ]);
  
           $customer_pay = $stripe->customers->create([
                'name'=>$order->first_name . " ". $order->last_name,
                'email'=>$order->email,
                'source'=>$stripeToken,
                'phone'=>$customer->phone,
                'description' => '',
              ]);
             
            //   $customer->cus_paymentid = $customer_pay['id'];
            //   $customer->save();
            return $customer_pay['id'];
        }
        
    }

    public function getPaymentMethod($cusid){
        $stripe_secret = Config::get('app.stripe_secret');
        $stripe = new \Stripe\StripeClient($stripe_secret);
        $payid =  $stripe->customers->retrieve(
            $cusid,
                []
        );
        $response = $stripe->customers->retrieveSource(
            $cusid,
            $payid['default_source'],
            []
          );
        return $response;
    }

}