<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Otp;
use Ichtrojan\Otp\Otp;

class CheckMailsController extends BaseController
{
    private $otp;

    public function __construct(Otp $Otp)
    {
        $this->otp = $Otp;
    }


    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'g-recaptcha-response' => 'required'
        ], [
            'email.required' => trans('labels.log_in_register.email_required'),
            'g-recaptcha-response.required' => "g-recaptcha-response is required"
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $is_google_mail = Customer::where('email', $request->email)->whereNotNull('google_id')->whereNull('password')->exists();
        if ($is_google_mail) {
            $mdq_user = Customer::where('email', $request->email)->first();
            $success['first_name'] =  $mdq_user->first_name;
            $success['last_name'] =  $mdq_user->last_name;
            $success['profile_img'] =  $mdq_user->profile_img;
            $success['page'] = "login-same-email";
            return $this->sendResponse($success, 'Google email already Exist!');
        }

        $is_record = Customer::where('email', $request->email)->exists();
        if ($is_record) {
            $success['page'] = "login";
            return $this->sendResponse($success, 'Email already Exist!');
        }

        $success['page'] = "register";
        return $this->sendResponse($success, 'Email is not exist!');
    }

    public function checkPhno(Request $request)
    {

    }

    public function checkOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'otp'   => 'required'
        ], [
            'phno.required' => trans('labels.log_in_register.phone_required'),
            'otp.required' => trans('labels.log_in_register.otp_required')
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $otp =  $this->otp->validate($request->phno, $request->otp);
        return $this->sendResponse($otp, null);

    }
}
