<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Mail\GeneralMail;
use Illuminate\Http\Request;
use App\Rules\IsValidPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:customers|email:rfc,dns',
            'password' => [
                'required',
                'min:8',
                'max:20',
                new IsValidPassword(),
            ],
        ], [
            "email.required" => trans('labels.log_in_register.email_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
            // "password.regex" => "Password must have at least one number ‘0’-‘9’.",
            "password.min" => trans('labels.log_in_register.pwd_at_least'),
            "password.max" => trans('labels.log_in_register.max_pwd')
        ]);
        
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }

        if ($validator->passes()) {
            $is_record = Customer::where('email', $request->email)->exists();
            if ($is_record) {

                $mdq_user = Customer::where('email', $request->email)->where('email_is_verified',true)->first();

                if (!$mdq_user || !Hash::check($request->password, $mdq_user->password)) {
                    return $this->sendError(trans('labels.log_in_register.wrong_password'), ['error' => 'Wrong Password']);
                }

                if (Auth::attempt($request->only('email', 'password'))) {
                    return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                }

                $mdq_user = Customer::where('email', $request->email)->firstOrFail();
                $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
                $success['name'] =  $mdq_user->first_name;
                $success['user'] = $mdq_user;
                Auth::guard('customer')->login($mdq_user);
                return $this->sendResponse($success, 'User login successfully.');
            } else {
                $activation_code = sha1(mt_rand(10000,99999).time().$request->email);
                $mdq_user = Customer::create([
                    'first_name'    => '',
                    'last_name'     => '',
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                   'activation_code' => $activation_code,
                    // 'email_is_verified' => 1
                ]);
                //createFmailyMemberMyself($mdq_user);
                $token = $mdq_user->createToken('auth_token')->plainTextToken;
                $success['access_token'] = $token;
                $success['token_type'] = "Bearer";
                $success['user'] = $mdq_user;
                // Auth::guard('customer')->login($mdq_user);
                $data = [
                    'email' => $mdq_user->email,
                    'name' => $mdq_user->first_name,
                    'created_at' => $mdq_user->created_at,
                    'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
                    'activate_account' => 'activate_account',
                    
                ];
                Mail::to($mdq_user->email)->send(new GeneralMail($data));
                return $this->sendResponse($success, 'User register successfully.');
            }
        }
    }

    // Phone SignIn/SignUp
    public function phLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:customers|email:rfc,dns',
            'phno' => 'required',
            'password' => [
                'required',
                'min:8',
                'max:20',
                new IsValidPassword(),
            ],
        ], [
            "email.required" => trans('labels.log_in_register.email_required'),
            "phno.required" => trans('labels.log_in_register.phone_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
            // "password.regex" => "Password must have at least one number ‘0’-‘9’.",
            "password.min" => trans('labels.log_in_register.pwd_at_least'),
            "password.max" => trans('labels.log_in_register.max_pwd')
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }
        // $receiverNumber = $request->phone_code.$request->phno;
        $is_record = Customer::where('phone', $request->phno)->exists();
        $activation_code = sha1(mt_rand(10000,99999).time().$request->email);
        if ($is_record) {
            $mdq_user = Customer::where('phone', $request->phno)->first();
            if ($mdq_user->password == NULL) { // register user
                if (Auth::attempt($request->only('email', 'password'))) {
                    return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                }

                $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
                $success['first_name'] =  $mdq_user->first_name;
                $success['last_name'] =  $mdq_user->last_name;
               
                $mdq_user->update([
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'activation_code' => $activation_code,
                ]);
                $data = [
                    'email' => $request->email,
                    'name' => $mdq_user->first_name,
                    'created_at' => $mdq_user->created_at,
                    'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
                    'activate_account' => 'activate_account',
                    
                ];
                Mail::to($mdq_user->email)->send(new GeneralMail($data));
                // Auth::guard('customer')->login($mdq_user);
                return $this->sendResponse($success, 'User login successfully.');
            } else { // login user
                if (!$mdq_user || !Hash::check($request->password, $mdq_user->password)) {
                    return $this->sendError(trans('labels.log_in_register.wrong_password'), ['error' => 'Wrong Password']);
                }

                if (Auth::attempt($request->only('email', 'password'))) {
                    return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                }

                $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
                $success['first_name'] =  $mdq_user->first_name;
                $success['last_name'] =  $mdq_user->last_name;
                $mdq_user->update([
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'activation_code' => $activation_code,
                ]);
                $data = [
                    'email' => $request->email,
                    'name' => $mdq_user->first_name,
                    'created_at' => $mdq_user->created_at,
                    'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
                    'activate_account' => 'activate_account',
                    
                ];
                Mail::to($request->email)->send(new GeneralMail($data));
                // Auth::guard('customer')->login($mdq_user);
                return $this->sendResponse($success, 'User login successfully.');
            }
        }else{
            $mdq_user = Customer::create([
                'first_name'        => '',
                'last_name'         => '',
                'phone'             => $request->phno,
                'email'   => $request->email,
                'password' => Hash::make($request->password),
                'activation_code'   => $activation_code,
                'is_verified' => 1
            ]);
            $data = [
                'email' => $request->email,
                'name' => $mdq_user->first_name,
                'created_at' => $mdq_user->created_at,
                'activate_link' => '/'.app()->getLocale().'/customer/activate/'.$activation_code,
                'activate_account' => 'activate_account',
                
            ];
            $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
            $success['first_name'] =  $mdq_user->first_name;
            $success['last_name'] =  $mdq_user->last_name;
            Mail::to($mdq_user->email)->send(new GeneralMail($data));
            return $this->sendResponse($success, 'User login successfully.');
        }
    }

    public function ResetPass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required',
            'password' => [
                'required',
                'min:8',
                'max:20',
                new IsValidPassword(),
            ],
        ], [
            "value.required" => " Email or ph no is required",
            "password.required" => trans('labels.log_in_register.required_password'),
            "password.min" => trans('labels.log_in_register.pwd_at_least'),
            "password.max" => trans('labels.log_in_register.max_pwd')
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }
        if($request->col =="phone"){
            $is_record = Customer::where('phone', $request->value)->exists();

        }else{
            $is_record = Customer::where('email', $request->value)->exists();
        }
        if (!$is_record) {
            return $this->sendError($request->col .'does not exists, pls register first', []);
        }
        if($request->col =="phone"){
             $mdq_user = Customer::where('phone', $request->value)->first();

        }else{
            $mdq_user = Customer::where('email', $request->value)->first();
        }
        $mdq_user->update(['password' => Hash::make($request->password)]);

        $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
        $success['first_name'] =  $mdq_user->first_name;
        $success['last_name'] =  $mdq_user->last_name;
        // Auth::guard('customer')->login($mdq_user);
        return $this->sendResponse($success, 'Password Reset  successfully.');
    }


    public function googleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => [
                'required',
                'min:8',
                'max:20',
                new IsValidPassword(),
            ],
        ], [
            "email.required" => trans('labels.log_in_register.email_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
            // "password.regex" => "Password must have at least one number ‘0’-‘9’.",
            "password.min" => trans('labels.log_in_register.pwd_at_least'),
            "password.max" => trans('labels.log_in_register.max_pwd')
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }

        if ($validator->passes()) {
            $is_record = Customer::where('email', $request->email)->exists();
            if ($is_record) {

                $mdq_user = Customer::where('email', $request->email)->first();

                if ($mdq_user->password == NULL) { // register user
                    if (Auth::attempt($request->only('email', 'password'))) {
                        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                    }

                    $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
                    $success['first_name'] =  $mdq_user->first_name;
                    $success['last_name'] =  $mdq_user->last_name;

                    $mdq_user->update(['password' => Hash::make($request->password)]);
                    Auth::guard('customer')->login($mdq_user);
                    return $this->sendResponse($success, 'User login successfully.');
                }
            }

        }
    }

    public function facebookRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => [
                'required',
                'min:8',
                'max:20',
                new IsValidPassword(),
            ],
        ], [
            "email.required" => trans('labels.log_in_register.email_required'),
            "password.required" => trans('labels.log_in_register.required_password'),
            // "password.regex" => "Password must have at least one number ‘0’-‘9’.",
            "password.min" => trans('labels.log_in_register.pwd_at_least'),
            "password.max" => trans('labels.log_in_register.max_pwd')
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), $validator->errors());
        }
        $check_mail = Customer::where('email', $request->email)->exists();
        if ($check_mail) {
            return $this->sendError('Email already Exist!', 'Email already Exist!');
        }

        if ($validator->passes()) {
                $is_record = Customer::where('id', $request->user_id)->exists();
                if ($is_record) {

                    $mdq_user = Customer::where('id', $request->user_id)->first();

                    if ($mdq_user->password == NULL) { // register user
                        if (Auth::attempt($request->only('email', 'password'))) {
                            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
                        }

                        $success['access_token'] =  $mdq_user->createToken('auth_token')->plainTextToken;
                        $success['first_name'] =  $mdq_user->first_name;
                        $success['last_name'] =  $mdq_user->last_name;

                        $mdq_user->update(['password' => Hash::make($request->password) , 'email' => $request->email]);
                        Auth::guard('customer')->login($mdq_user);
                        return $this->sendResponse($success, 'User login successfully.');
                    }
                }



        }
    }
}
