<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QDollarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        ];
        
    }

    public function messages()
    {
        return [
            'name_en.required' => ' Name (EN) is required',
            'name_tc.required' => ' Name (TC) is required',
        ];
    }
}
