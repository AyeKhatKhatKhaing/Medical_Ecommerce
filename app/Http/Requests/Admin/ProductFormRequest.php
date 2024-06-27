<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name_en' => 'required',
            'name_tc' => 'required',
            'name_sc' => 'required',
            'product_code' => 'required',
            'merchant_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'check_up_package_id' => 'required',
            // 'featured_img' => 'required',
            'merchant_locations' => 'required|array|min:1',
            'holder7.*' => 'valid_video_url',
            // 'holder4' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => ' Name (EN) is required',
            'name_tc.required' => ' Name (TC) is required',
            'name_sc.required' => ' Name (SC) is required',
            'product_code.required' => ' Product Code is required',
            'merchant_id.required' => 'Merchant is required',
            'category_id.required' => 'Cartegory is required',
            'sub_category_id.required' => 'Sub Category is required',
            'check_up_package_id.required' => 'Check Up Package is required',
            // 'featured_img.required' => 'Feature Image is required',
            'merchant_locations.required' =>'Merchant Location is Required',
            'holder7.*.valid_video_url' => 'Video type should be mp4 and mpeg',
            // 'holder4.required' => 'Common Area images are required.',
        ];
    }
}
