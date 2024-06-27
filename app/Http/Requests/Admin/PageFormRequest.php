<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
            'name_en'    => 'required',
            'name_sc'    => 'required',
            'name_tc'    => 'required',
            'content_en' => 'required',
            'content_sc' => 'required',
            'content_tc' => 'required',
        ];
    }

    public function messaeges()
    {
        return [
            'name_en'    => 'Name is required',
            'name_sc'    => 'Name is required',
            'name_tc'    => 'Name is required',
            'content_en' => 'Content is required',
            'content_sc' => 'Content is required',
            'content_tc' => 'Content is required',
        ];
    }
}
