<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BankInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bank_name_en'     => 'required',
            'bank_name_tc'     => 'required',
            'bank_name_sc'     => 'required',
            'account_number'     => 'required',
            'logo'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'bank_name_en.required'     => 'Bank Name (En ) is required',
            'bank_name_tc.required'     => 'Bank Name (Tc ) is required',
            'bank_name_sc.required'     => 'Bank Name (Sc ) is required',
            'account_naumber.required'     => 'Bank Account Number is required',
            'logo.required'     => 'Logo is required',
        ];
    }
}
