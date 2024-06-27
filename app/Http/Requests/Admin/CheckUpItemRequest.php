<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CheckUpItemRequest extends FormRequest
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
            'gender'               =>'required | integer',
            'name_en'             => 'required',
            'name_tc'             => 'required',
            'name_sc'             => 'required',
            // 'content_en'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'gender.required'     => 'Gender is required',
            'name_en.required'    => 'Name (EN) is required',
            'name_tc.required'    => 'Name (TC) is required',
            'name_sc.required'    => 'Name (SC) is required',
            // 'content_en.required'     => 'Content (EN) is required',
            // 'check_items.required' => 'Please select at least one check up item',
        ];
    }
}
