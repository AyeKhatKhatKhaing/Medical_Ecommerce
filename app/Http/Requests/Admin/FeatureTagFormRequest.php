<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeatureTagFormRequest extends FormRequest
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
            'name_en'     => 'required',
            'name_sc'     => 'required',
            'name_tc'     => 'required',
            // 'content_en'     => 'required',
            // 'content_sc'     => 'required',
            // 'content_tc'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required'     => 'Name (EN) is required',
            'name_sc.required'     => 'Name (SC) is required',
            'name_tc.required'     => 'Name (TC) is required',
            // 'content_en.required'     => 'Content (EN) is required',
            // 'content_sc.required'     => 'Content (SC) is required',
            // 'content_tc.required'     => 'Content (TC) is required',
        ];
    }
}
