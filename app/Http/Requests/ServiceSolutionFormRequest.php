<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceSolutionFormRequest extends FormRequest
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
            'main_title_en'     => 'required',
            'main_sub_title_en' => 'required',
            'title_en'          => 'required',
            'sub_title_en'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'main_title_en.required'         => 'Main Title (EN) is required',
            'main_sub_title_en.required'     => 'Main Sub Title (EN) is required',
            'title_en.required'              => 'Title (EN) is required',
            'sub_title_en.required'             => 'Sub Title (EN) is required',
        ];
    }
}
