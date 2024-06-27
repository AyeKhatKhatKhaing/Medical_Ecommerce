<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCustomerRequest extends FormRequest
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
            //
            'title'       => 'required',
            'name'       => 'required',
            'first_name'       => 'required',
            'phone_number'       => 'required|min:8',
            'business_email'       => 'required',
            'company_name'       => 'required',
            // 'company_size'       => 'required',
            'serviceOption'       => 'required',
            // 'agreement' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'title.required'          => trans('labels.partnership.title'),
            'name.required'           => trans('labels.partnership.name'),
            'first_name.required'           => trans('labels.partnership.first_name_required'),
            'phone_number.required'   => trans('labels.partnership.phone_required'),
            'phone_number.min'        => trans('labels.check_out.ph_no_must_8digit'),
            'business_email.required' => trans('labels.partnership.business_email_required'),
            // 'business_epmail.email'    => 'Please enter a valid email address for the business email.',
            'company_name.required'   => trans('labels.partnership.company_name_required'),
            'serviceOption.required'  => trans('labels.partnership.find_out_more_required'),
        ];
    }
}
