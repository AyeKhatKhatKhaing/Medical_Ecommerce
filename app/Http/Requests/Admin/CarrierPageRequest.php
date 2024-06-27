<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarrierPageRequest extends FormRequest
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
            'title_en' => 'required',
            'title_tc' => 'required',
            'title_sc' => 'required',
            'sub_title_en' => 'required',
            'sub_title_tc' => 'required',
            'sub_title_sc' => 'required',
            'img' => 'required',
            'email' => 'required',
            'text_en' => 'required',
            'text_tc' => 'required',
            'text_sc' => 'required',
        ];
    }
}
