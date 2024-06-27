<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FooterFormRequest extends FormRequest
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
            // 'content_en'     => 'required',
            // 'content_sc'     => 'required',
            // 'content_tc'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content_en.required'     => 'Content (EN) is required',
            'content_sc.required'     => 'Content (SC) is required',
            'content_tc.required'     => 'Content (TC) is required',
        ];
    }
}
