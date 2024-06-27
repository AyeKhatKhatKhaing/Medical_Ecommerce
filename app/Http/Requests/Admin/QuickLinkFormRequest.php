<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuickLinkFormRequest extends FormRequest
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
            'img'          => 'required',
            'link'         => 'required',
            'link_text'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'img.required'          => 'Image is required',
            'link.required'         => 'Page Type is required',
            'link_text.required'    => 'Slider Type is required',
        ];
    }
}
