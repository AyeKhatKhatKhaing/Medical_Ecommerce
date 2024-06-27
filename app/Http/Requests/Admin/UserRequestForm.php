<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UserRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function rules()
    // {
    //     $user_id = isset($this->id) ? $this->id : '';
    //     $phoneNo = "";
        
    //     if ($this->code && $this->phone) {
    //         $phoneNo = $this->code . $this->phone;
    //     }
        
    //     return [
    //         'email' => 'required|email|unique:customers,email,' . $user_id,
    //         'phoneNo' => 'required|unique:customers,phone',
    //     ];
    // }

   public function rules()
   {
    return [
        'email' => [
            'required',
            'email',
            function ($attribute, $value, $fail) {
                $user_id = isset($this->id) ? $this->id : '';
                $existingCustomer = DB::table('customers')
                    ->where('email', $value)
                    ->where('id', '!=', $user_id)
                    ->first();
    
                if ($existingCustomer) {
                    $fail('Email is already in use');
                }
            },
        ],
        'phone' => [
            'required',
            'numeric', // Add numeric validation rule for phone
            function ($attribute, $value, $fail) {
                $user_id = isset($this->id) ? $this->id : '';
                $existingCustomer = DB::table('customers')
                    ->where('phone', $value)
                    ->where('id', '!=', $user_id)
                    ->first();
    
                if ($existingCustomer) {
                    $fail('Phone number is already in use');
                }
            },
        ],        
    ];
    
   }

    
    public function messages()
    {
        return [
            'email.required' => 'Email must be required and unique',
            'phone.required' => 'Phone number is required',
        ];
    }
    

}
