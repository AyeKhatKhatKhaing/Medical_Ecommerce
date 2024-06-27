<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogDetailsFormRequest extends FormRequest
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
            'title_en'     => 'required',
            'title_sc'     => 'required',
            'title_tc'     => 'required',
            'sort_order_no'     => ['required','unique:blog_details,sort_order_no'.','.$this->id.',id,blog_id,'.$this->blog_id]
            // 'title_no_en'     => 'required',
            // 'title_no_sc'     => 'required',
            // 'title_no_tc'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required'     => 'Title (EN) is required',
            'title_sc.required'     => 'Title (SC) is required',
            'title_tc.required'     => 'Title (TC) is required',
            // 'title_no_en.required'     => 'Title No (EN) is required',
            'title_no_sc.required'     => 'Title No (SC) is required',
            'title_no_tc.required'     => 'Title No (TC) is required',
        ];
    }
}
