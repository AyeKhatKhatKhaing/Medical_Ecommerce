<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentTypeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'publishable_key'     => 'required',
            'secret_key'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Name is required',
            'publishable_key.required'     => 'Publishable Key is required',
            'secret_key.required'     => 'Secret Key is required',
        ];
    }
}
