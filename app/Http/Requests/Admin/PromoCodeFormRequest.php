<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeFormRequest extends FormRequest
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
            'code'     => 'required',
            'amount'     => 'required|integer',
            'start_date'     => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'user_limit'=> 'required|integer',
            'use_limit'=> 'required|integer',
            // 'icon' => 'nullable|image',

        ];
    }

    public function messages()
    {
        return [
            'code.required'     => 'code is required',
            'amount.required'     => 'Amount is required',
            'start_date.required'     => 'Start date is required',
            'end_date.required' => 'End date is required',
            'user_limit.required' => 'Usage Limit Per User is required',
            'use_limit.required' => 'Usage Limit Per Coupon is required',

        ];
    }
}
