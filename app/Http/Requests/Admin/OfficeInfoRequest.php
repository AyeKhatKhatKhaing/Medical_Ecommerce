<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfficeInfoRequest extends FormRequest
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
            'office_name_en'     => 'required',
            'office_name_tc'     => 'required',
            'office_name_sc'     => 'required',
            'address_en'     => 'required',
            'address_tc'     => 'required',
            'address_sc'     => 'required',
            'image'     => 'required',
            'location'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'office_name_en.required'     => 'Office Name (En) is required',
            'office_name_tc.required'     => 'Office Name (Tc) is required',
            'office_name_sc.required'     => 'Office Name (Sc) is required',

            'address_en.required'     => 'Office Address (En) is required',
            'address_tc.required'     => 'Office Address (Tc) is required',
            'address_sc.required'     => 'Office Address (Sc) is required',
           
            'image.required'     => 'Images is required',
            'location.required'     => 'Location is required',
        ];
    }
}
