<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $user_id = isset($this->user->id) ? $this->user->id : '';
        return [
            'name_en'       => 'required',
            'name_tc'       => 'required',
            'name_sc'       => 'required',
            'email'         => 'required|email|unique:users,email,' . $user_id,
            'phone'         => 'required|unique:users,phone'
        ];
    }

    public function messages()
    {
        return [
            'name_en.required'  => 'Name is required for en',
            'name_tc.required'  => 'Name is required for tc',
            'name_sc.required'  => 'Name is required for sc',
            'email.required'    => 'Email must required and unique',
            'phone.required'    => 'Phone number is required',
        ];
    }

    // public function withValidator($validator)
    // {
    //     if(!is_null($this->gallery_image)) {
    //         dd('hello');
    //         $data = [];
    //         foreach($this->gallery_image as $image) {

    //             $file_path = existImagePath($image);

    //             $validator->after(function($validator) use($file_path) {
    //                 if(!$file_path) {
    //                     $validator->errors()->add('image', 'Invalid image path.');
    //                 }
    //             });

    //             $data[] = $file_path;
    //         }

    //         $this->merge([
    //             'gallery' => json_encode($data)
    //         ]);
    //     }
    // }
}
