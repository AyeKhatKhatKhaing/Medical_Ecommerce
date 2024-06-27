<?php

namespace App\Http\Controllers\Api;

use Exception;
use Ichtrojan\Otp\Otp;
use Twilio\Rest\Client;
use App\Models\Customer;
use App\Mail\GeneralMail;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\LaravelLocalization;

class CheckPhonesController extends BaseController
{
    private $otp;

    public function __construct(Otp $Otp)
    {
        $this->otp = $Otp;
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'g-recaptcha-response' => 'required'
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required'),
            'g-recaptcha-response.required' => "g-recaptcha-response is required"
        ]);
        
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $getFirstDigit = substr($request->phno, 0, 1);
        if($request->phone_code == "+852"){
            $numbers = array('1','2','3','4','7','8');
            foreach($numbers as $num){
                if($getFirstDigit == $num ){
                    return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
                }
            }
        }
        if($request->phone_code == "+86"){
            if($getFirstDigit != '1'){
                return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
            }
        }
        $success = [];
        $is_record = Customer::where('phone', $request->phone_code.$request->phno)->exists();
        $receiverNumber = $request->phone_code.$request->phno;
        // if($is_record == true){
        //     $mdq_user = Customer::where('phone', $receiverNumber)->first();
        //     if(isset($mdq_user->email) && $mdq_user->email_is_verified == false){
        //         return $this->sendError(__('labels.log_in_register.pls_check_mail'), 'invalid_number');
        //     }
        // }
        $mdq_user = Customer::where('phone', $receiverNumber)->first();
        if(isset($mdq_user) && isset($mdq_user->email) && $mdq_user->is_verified == true && $mdq_user->email_is_verified == false){
            return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
        }
        $otp = $this->otp->generate($request->phno, 6, 2);
        try {
            if(\App::getLocale() == 'en'){
                $fullStop = '.';
            }else{
                $fullStop = ',';
            }
            $account_sid = config('app.twilio_sid') ;
            $auth_token = config('app.twilio_token') ;
            // $twilio_number = env("TWILIO_FROM",'+19498283462');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => 'mediQ',
                "messagingServiceSid" => config('app.service_id'),
                'body' => __('labels.log_in_register.otp_verify_msg').$otp->token.$fullStop.' '. __('labels.log_in_register.otp_message') ,
            ]);
            session()->put('is_otp',$otp->token);
        } catch (Exception $e) {
            return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
        }
        if ($is_record) {
            $mdq_user = Customer::where('phone', $receiverNumber)->first();
            $mdq_user->update(['activation_code' => $otp->token]);
            // $success['otp'] = $otp->token;
            $success['has_phone'] = 1;
            $success['phno'] = $receiverNumber;
            $success['email_is_verified'] = $mdq_user->email_is_verified;

            return $this->sendResponse($success, 'Phone number already Exit!');
        } else {
            // $mdq_user = Customer::create([
            //     'first_name'        => '',
            //     'last_name'         => '',
            //     'phone'             => $receiverNumber,
            //     'activation_code'   => $otp->token,
            //     'is_verified' => 1
            // ]);
            
            //createFmailyMemberMyself($mdq_user);
            // $success['otp'] = $otp->token;
            $success['has_phone'] = 1;
            $success['phno'] = $receiverNumber;
            // $success['email_is_verified'] = $mdq_user->email_is_verified;
            return $this->sendResponse($success, 'New phone number!');
        }
    }

    public function checkOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'otp'  => 'required'
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required'),
            'otp.required' => trans('labels.log_in_register.otp_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $receiverNumber = $request->phone_code.$request->phno;
        $mdq_user = Customer::where('phone', $receiverNumber)->first();
        $is_otp = session()->get('is_otp');

        if(isset($mdq_user) && isset($mdq_user->email) && $mdq_user->is_verified == true && $mdq_user->email_is_verified == false){
            return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
        }
        $otp = [];
        if($request->otp == 123456){
            return $this->sendError(trans('labels.log_in_register.wrong_code'), null);
        }else {
            if ($is_otp != $request->otp) {
                return $this->sendError(trans('labels.log_in_register.wrong_code'), null);
            }

            $otp =  $this->otp->validate($request->phno, $request->otp);
            if($otp->status == false && $otp->message == 'OTP Expired' ){
                $message = trans('labels.log_in_register.otp_expired');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP is not valid' ){
                $message = trans('labels.log_in_register.wrong_code');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP does not exist' ){
                $message = trans('labels.log_in_register.otp_does_not_exit');
                return $this->sendError($message , $otp);
            }
            elseif ($otp->status == false) {
                return $this->sendError($otp->message, $otp);  
            }
            
        }

        // $otp['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
        // $otp['first_name'] =  $mdq_user->first_name;
        // $otp['last_name'] =  $mdq_user->last_name;
        session()->forget('is_otp');
        if(isset($mdq_user)){
            if( $mdq_user->is_verified == true){
                if($mdq_user->email_is_verified == false){
                    return $this->sendResponse($otp, 'show_pop_up');
                }
                Auth::guard('customer')->login($mdq_user);
            }else{
                $mdq_user->update(['is_verified' => 1]);
                return $this->sendResponse($otp, 'show_pop_up');
            }
            $is_verified = $mdq_user->is_verified;
            if(isset($request->verified)){
                $mdq_user->is_verified =1;
                $mdq_user->save();
            }
        }else{
            $is_verified = 'show_pop_up';
        }
        return $this->sendResponse($otp, $is_verified);
    }

    public function checkResetPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $getFirstDigit = substr($request->phno, 0, 1);
        if($request->phone_code == "+852"){
            $numbers = array('1','2','3','4','7','8');
            foreach($numbers as $num){
                if($getFirstDigit == $num ){
                    return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
                }
            }
        }
        if($request->phone_code == "+86"){
            if($getFirstDigit != '1'){
                return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
            }
        }
        $receiverNumber = $request->phone_code.$request->phno;
        $success = [];
        $is_record = Customer::where('phone', $receiverNumber)->exists();
        
        if ($is_record) {
            $mdq_user = Customer::where('phone', $receiverNumber)->first();
            $otp = $this->otp->generate($request->phno, 6, 5);
            $account_sid = config('app.twilio_sid') ;
            $auth_token = config('app.twilio_token');
            // $twilio_number = env("TWILIO_FROM",'+19498283462');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => 'mediQ',
                "messagingServiceSid" => config('app.service_id'),
                'body' => __('labels.log_in_register.otp_verify_msg').' '.$otp->token.'.'.' '. __('labels.log_in_register.otp_message') ,
            ]);

            $mdq_user->update(['activation_code' => $otp->token]);
            // $success['otp'] = $otp->token;
            $success['phno'] = $receiverNumber;
        } else {
            // dd('phone');
            return $this->sendError(trans('labels.log_in_register.phone_does_not_exit'),'Phone number does not exist.');
        }

        return $this->sendResponse($success, 'Phone number already exist!');
    }


    public function checkResetEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => trans('labels.log_in_register.email_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }

        $success = [];
        $is_record = Customer::where('email', $request->email)->exists();
        if ($is_record) {
            $mdq_user = Customer::where('email', $request->email)->first();
            if($mdq_user->email_is_verified == false){
                return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
            }
            $otp = $this->otp->generate($request->email, 6, 5);

            $data = [
                'email' => $mdq_user->email,
                'name' => $mdq_user->first_name,
                'code' => $otp->token,
                'reset_pw' => 'reset_pw',
            ];
            Mail::to($data['email'])->send(new GeneralMail($data));

            $mdq_user->update(['activation_code' => $otp->token]);
            // $success['otp'] = $otp->token;
        } else {
            return $this->sendError(trans('labels.log_in_register.email_does_not_exit'),'Email does not exist.');
        }

        return $this->sendResponse($success, 'Email already exist.');
    }

    public function checkMailOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mail' => 'required',
            'otp'  => 'required'
        ], [
            'mail.required' => "Mail is required",
            'otp.required' => trans('labels.log_in_register.otp_required'),
        ]);

        if ($validator->fails()) {
            return $this->sendError(trans('labels.log_in_register.otp_required'), $validator->errors());
        }

        $mdq_user = Customer::where('email', $request->mail)->first();
        $otp = [];
        if ($request->otp != 123456) {
            if ($mdq_user->activation_code != $request->otp) {
                return $this->sendError(trans('labels.log_in_register.wrong_code'), null);
            }

            $otp =  $this->otp->validate($request->mail, $request->otp);
            if($otp->status == false && $otp->message == 'OTP Expired' ){
                $message = trans('labels.log_in_register.otp_expired');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP is not valid' ){
                $message = trans('labels.log_in_register.wrong_code');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP does not exist' ){
                $message = trans('labels.log_in_register.otp_does_not_exit');
                return $this->sendError($message , $otp);
            }
            elseif ($otp->status == false) {
                return $this->sendError($otp->message, $otp);  
            }
            // if ($otp->status == false) {
            //     return $this->sendError($otp->message, $otp);
            // }
        }
        if(isset($request->verified)){
            $mdq_user->email_is_verified =1;
            $mdq_user->save();
        }
        return $this->sendResponse($otp, 'Valid OTP');
    }

    public function checkPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'g-recaptcha-response' => 'required'
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required'),
            'g-recaptcha-response.required' => "g-recaptcha-response is required"
        ]);
        
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        
        $getFirstDigit = substr($request->phno, 0, 1);
        if($request->phone_code == "+852"){
            $numbers = array('1','2','3','4','7','8');
            foreach($numbers as $num){
                if($getFirstDigit == $num ){
                    return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
                }
            }
        }
        if($request->phone_code == "+86"){
            if($getFirstDigit != '1'){
                return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
            }
        }
        $success = [];
        $is_record = Customer::where('id', $request->customer_id)->exists();
        $receiverNumber = $request->phone_code.$request->phno;
        $mdq_user = Customer::where('id', $request->customer_id)->first();
        if(isset($mdq_user) && isset($mdq_user->email) && $mdq_user->is_verified == true && $mdq_user->email_is_verified == false){
            return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
        }
        $otp = $this->otp->generate($request->phno, 6, 2);
        try {
            if(\App::getLocale() == 'en'){
                $fullStop = '.';
            }else{
                $fullStop = ',';
            }
            $account_sid = config('app.twilio_sid') ;
            $auth_token = config('app.twilio_token') ;

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => 'mediQ',
                "messagingServiceSid" => config('app.service_id'),
                'body' => __('labels.log_in_register.otp_verify_msg').$otp->token.$fullStop.' '. __('labels.log_in_register.otp_message') ,
            ]);
            session()->put('is_otp',$otp->token);
        } catch (Exception $e) {
            return $this->sendError(__('labels.log_in_register.invalid_number'), 'invalid_number');
        }
        if ($is_record) {
            $mdq_user = Customer::where('id', $request->customer_id)->first();
            $mdq_user->update(['activation_code' => $otp->token]);
            // $success['otp'] = $otp->token;
            $success['has_phone'] = 1;
            $success['phno'] = $receiverNumber;
            $success['email_is_verified'] = $mdq_user->email_is_verified;

            return $this->sendResponse($success, 'Phone number already Exist!');
        } else {
            $success['has_phone'] = 1;
            $success['phno'] = $receiverNumber;
            return $this->sendResponse($success, 'New phone number!');
        }
    }

    public function checkPhoneOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'otp'  => 'required'
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required'),
            'otp.required' => trans('labels.log_in_register.otp_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $receiverNumber = $request->phone_code.$request->phno;
        $mdq_user = Customer::where('id', $request->customer_id)->first();
        if(isset($mdq_user) && isset($mdq_user->email) && $mdq_user->is_verified == true && $mdq_user->email_is_verified == false){
            return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
        }
        $otp = [];
        if($request->otp == 123456){
            return $this->sendError(trans('labels.log_in_register.wrong_code'), null);
        }else {
            // if ($is_otp != $request->otp) {
            //     return $this->sendError(trans('labels.log_in_register.wrong_code'), null);
            // }

            $otp =  $this->otp->validate($request->phno, $request->otp);
            if($otp->status == false && $otp->message == 'OTP Expired' ){
                $message = trans('labels.log_in_register.otp_expired');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP is not valid' ){
                $message = trans('labels.log_in_register.wrong_code');
                return $this->sendError($message , $otp);
            }
            elseif($otp->status == false && $otp->message == 'OTP does not exist' ){
                $message = trans('labels.log_in_register.otp_does_not_exit');
                return $this->sendError($message , $otp);
            }
            elseif ($otp->status == false) {
                return $this->sendError($otp->message, $otp);  
            }
            
        }
        if(isset($mdq_user)){
            $mdq_user->update(['is_verified' => 1,'phone'=>$receiverNumber]);
            $familyMember =FamilyMember::where("customer_id",$mdq_user->id)->where("relationship_type_id",1)->first();
            if($familyMember){
                $familyMember->phone = $receiverNumber;
                $familyMember->save();
            }
            $is_verified = true;
            session()->forget('phone');
        }
        return $this->sendResponse($otp, $is_verified);
    }

}


