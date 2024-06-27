<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $user_id = isset($this->user->id) ? $this->user->id : '';
        return [
            'currentPassword'               => 'required',
            'newPassword'                   => ['required','string','min:8','max:20'],
            'newPasswordConfirmation'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'currentPassword.required'=>trans('labels.log_in_register.current_password'),
            'newPassword.required'=>trans('labels.log_in_register.new_password'),
            'newPasswordConfirmation.required'=>trans('labels.log_in_register.new_password_confirmation'),
            'newPassword.min'  => trans('labels.log_in_register.pwd_at_least'),
            'newPassword.max'  => trans('labels.log_in_register.max_pwd'),
        ];
    }

     /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {

            if ( !Hash::check($this->currentPassword, auth()->guard('customer')->user()->password) ) {
                $validator->errors()->add('currentPassword',  trans('labels.log_in_register.current_pwd_incorrect'));
            }
            $character = "/[A-Za-z]/i";
            if(preg_match($character, $this->newPassword)==0){
                $validator->errors()->add('newPassword', trans('labels.log_in_register.pwd_chracter'));
            }
            $number = "/[0-9]/i";
            if(preg_match($number, $this->newPassword)==0){
                $validator->errors()->add('newPassword', trans('labels.log_in_register.password_must'));
            }
            if($this->newPassword!=$this->newPasswordConfirmation) {
                $validator->errors()->add('newPassword', trans('labels.log_in_register.does_not_match'));
            }

        });
        return;
    }
}
