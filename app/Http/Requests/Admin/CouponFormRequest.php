<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponFormRequest extends FormRequest
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
            'coupon_code'       => 'required|unique:coupons,coupon_code'.($this->coupon_id!=0?','.$this->coupon_id:''),
            'owner_type'        => 'required',
            'merchant_id'        => 'required_if:owner_type,1',
            'name_en'           => 'required',
            'name_tc'           => 'required',
            'coupon_amount'     => 'required',
            // 'start_date'        => 'required',
            // 'end_date'          => 'required',
            'product_categories'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'coupon_code.required'        => 'Coupon Code is required',
            'owner_type.required'        => 'Owner Type is required',
            'merchant_id.required'        => 'Merchant is when Owner Type is Merchant required',
            'name_en.required'        => 'Name EN is required',
            'name_tc.required' => 'Name TC is required',
            'coupon_amount.required'      => 'Coupon amount is required',
            // 'start_date.required'      => 'Start date is required',
            // 'end_date.required'      => 'End date is required',
            'product_categories.required'      => 'Main Category is required',
        ];
    }
}
