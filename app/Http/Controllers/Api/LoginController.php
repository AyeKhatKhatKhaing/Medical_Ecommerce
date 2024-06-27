<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Customer;
use App\Mail\GeneralMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController;

class LoginController extends BaseController
{
    public function emailLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'
        ], [
            "email.required" => trans('labels.log_in_register.email_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
            // "g-recaptcha-response.required" => "Recaptcha is required",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }

        if ($validator->passes()) {
            if ($request['remember_me'] == 1) {
                // setcookie('login_email',$request->email,time()+60*60*24*100);
                Cookie::queue(Cookie::make('login_email', $request->email, time() + 60 * 60 * 24 * 100));
            } else {
                // setcookie('login_email',$request->email,100);
                Cookie::queue(Cookie::forget('login_email'));
                // Cookie::queue(Cookie::make('login_email', $request->email,1));
            }
            $mdq_user = Customer::where('email', $request->email)->first();
            if (isset($mdq_user) && $mdq_user->email_is_verified == false) {
                $activation_code = sha1(mt_rand(10000,99999).time().$mdq_user->email);
                $mdq_user->update([
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'activation_code' => $activation_code,
                ]);
                $data = [
                    'email' => $mdq_user->email,
                    'name' => $mdq_user->first_name,
                    'created_at' => $mdq_user->created_at,
                    'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
                    'activate_account' => 'activate_account',
                    
                ];
                Mail::to($mdq_user->email)->send(new GeneralMail($data));
                return $this->sendError(trans('labels.log_in_register.activate_email'), ['error' => 'activate mail']);
            }
            if (!$mdq_user || !Hash::check($request->password, $mdq_user->password)) {
                return $this->sendError(trans('labels.log_in_register.wrong_password'), ['error' => 'Wrong Password']);
            }

            // if ( Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            //     return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
            // }
            
            $mdq_user = Customer::where('email', $request->email)->firstOrFail();
            $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
            $success['name'] =  $mdq_user->first_name;
            $success['user'] = $mdq_user;
            Auth::guard('customer')->login($mdq_user);
            $success['is_auth'] = Auth::guard('customer')->check();
            return $this->sendResponse($success, 'User login successfully.');
        }
    }

    public function phnoLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phno' => 'required',
            'password' => 'required',
        ], [
            "phno.required" => trans('labels.log_in_register.phone_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }
        $receiverNumber = $request->phone_code.$request->phno;
        $is_record = Customer::where('phone', $receiverNumber)->exists();
        if (!$is_record) {
            return $this->sendError('Phone number does not exist. Please register first.', []);
        }

        $mdq_user = Customer::where('phone', $receiverNumber)->first();
        if (!$mdq_user || !Hash::check($request->password, $mdq_user->password)) {
            // return $this->sendError('lables.log_in_register.success_login', ['error' => trans('lables.log_in_register.success_login')]);
            return $this->sendError(trans('labels.log_in_register.wrong_password'), ['error' => trans('labels.log_in_register.wrong_password')]);
        }

        if($mdq_user->is_verified == false){
            return $this->sendError(trans('labels.phone_verify_sms'), ['error' => 'phone_verified']);
        }
         if(isset($mdq_user) && isset($mdq_user->email) && $mdq_user->is_verified == true && $mdq_user->email_is_verified == false){
            return $this->sendError(trans('labels.log_in_register.activate_email'),'activate your mail'); 
        }
        // if ($mdq_user->email_is_verified == false) {
        //     $activation_code = sha1(mt_rand(10000,99999).time().$mdq_user->email);
        //     $mdq_user->update([
        //         'password' => Hash::make($request->password),
        //         'email' => $request->email,
        //         'activation_code' => $activation_code,
        //     ]);
        //     $data = [
        //         'email' => $mdq_user->email,
        //         'name' => $mdq_user->first_name,
        //         'created_at' => $mdq_user->created_at,
        //         'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
        //         'activate_account' => 'activate_account',
                
        //     ];
        //     Mail::to($mdq_user->email)->send(new GeneralMail($data));
        //     return $this->sendError(trans('labels.log_in_register.activate_email'), ['error' => 'activate mail']);
        // }
        
        // if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
        //     return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        // }
        $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
        $success['first_name'] =  $mdq_user->first_name;
        $success['last_name'] =  $mdq_user->last_name;
        Auth::guard('customer')->login($mdq_user);
        return $this->sendResponse($success, 'User login successfully.');
    }
}
