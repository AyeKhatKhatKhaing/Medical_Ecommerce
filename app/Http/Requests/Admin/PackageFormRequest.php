<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageFormRequest extends FormRequest
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
            'name_en' => 'required',
            'name_tc' => 'required',
            'merchant_id' => 'required|integer',
            // 'check_up_table_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => ' Name (EN) is required',
            'name_tc.required' => ' Name (TC) is required',
            'merchant_id.required' => 'Merchant is required',
            // 'check_up_table_id.required' => 'Check Up Table is required',
        ];
    }
}
