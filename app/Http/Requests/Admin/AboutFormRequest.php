<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutFormRequest extends FormRequest
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
            'banner_title_en'     => 'required',
            'banner_title_tc'     => 'required',
            'banner_title_sc'     => 'required',
            'banner_description_en'     => 'required',
            'banner_description_tc'     => 'required',
            'banner_description_sc'     => 'required',
            'cooperation_title_en'     => 'required',
            'cooperation_title_tc'     => 'required',
            'cooperation_title_sc'     => 'required',
            'cooperation_description_en'     => 'required',
            'cooperation_description_tc'     => 'required',
            'cooperation_description_sc'     => 'required',
            'group_title_en'     => 'required',
            'group_title_tc'     => 'required',
            'group_title_sc'     => 'required',
            'group_description_en'     => 'required',
            'group_description_tc'     => 'required',
            'group_description_sc'     => 'required',
            'mission_and_vision_description_en'     => 'required',
            'mission_and_vision_description_tc'     => 'required',
            'mission_and_vision_description_sc'     => 'required',
            'meta_title_en'     => 'required',
            'meta_title_tc'     => 'required',
            'meta_title_sc'     => 'required',
            'meta_description_en'     => 'required',
            'meta_description_tc'     => 'required',
            'meta_description_sc'     => 'required',
        ];
    }

    public function messages()
    {
        return [

            'banner_title_en.required'     => 'Banner title (EN) is required',
            'banner_title_tc.required'     => 'Banner title (TC) is required',
            'banner_title_sc.required'     => 'Banner title (SC) is required',
            'banner_description_en.required'     => 'Banner description (EN) is required',
            'banner_description_tc.required'     => 'Banner description (TC) is required',
            'banner_description_sc.required'     => 'Banner description (SC) is required',
            'cooperation_title_en.required'     => 'Cooperation title (EN) is required',
            'cooperation_title_tc.required'     => 'Cooperation title (TC) is required',
            'cooperation_title_sc.required'     => 'Cooperation title (SC) is required',
            'cooperation_description_en.required'     => 'Cooperation description (EN) is required',
            'cooperation_description_tc.required'     => 'Cooperation description (TC) is required',
            'cooperation_description_sc.required'     => 'Cooperation description (SC) is required',
            'group_title_en.required'     => 'Group title (EN) is required',
            'group_title_tc.required'     => 'Group title (TC) is required',
            'group_title_sc.required'     => 'Group title (SC) is required',
            'group_description_en.required'     => 'Group description (EN) is required',
            'group_description_tc.required'     => 'Group description (TC) is required',
            'group_description_sc.required'     => 'Group description (SC) is required',
        ];
    }
}
