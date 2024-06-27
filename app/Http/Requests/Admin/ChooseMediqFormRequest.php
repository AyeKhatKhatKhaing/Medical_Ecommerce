<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChooseMediqFormRequest extends FormRequest
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
            'main_title_tc'     => 'required',
            'main_title_sc'     => 'required',
            'main_content_en'     => 'required',
            'main_content_tc'     => 'required',
            'main_content_sc'     => 'required',
            'shopping_guide_title_en'     => 'required',
            'shopping_guide_title_tc'     => 'required',
            'shopping_guide_title_sc'     => 'required',
            'quick_start_guide_title_en'     => 'required',
            'quick_start_guide_title_tc'     => 'required',
            'quick_start_guide_title_sc'     => 'required',
            'quick_start_guide_content_en'     => 'required',
            'quick_start_guide_content_tc'     => 'required',
            'quick_start_guide_content_sc'     => 'required',
            'booking_title_en'     => 'required',
            'booking_title_tc'     => 'required',
            'booking_title_sc'     => 'required',
            'booking_content_en'     => 'required',
            'booking_content_tc'     => 'required',
            'booking_content_sc'     => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'main_title_en.required'     => 'Main Title (EN) is required',
            'main_title_tc.required'     => 'Main Title (TC) is required',
            'main_title_sc.required'     => 'Main Title (SC) is required',
            'main_content_en.required'     => 'Main Content (EN) is required',
            'main_content_tc.required'     => 'Main Content (TC) is required',
            'main_content_sc.required'     => 'Main Content (SC) is required',
            'shopping_guide_title_en.required'     => 'Shopping Guide Title (EN) is required',
            'shopping_guide_title_tc.required'     => 'Shopping Guide Title (TC) is required',
            'shopping_guide_title_sc.required'     => 'Shopping Guide Title (SC) is required',
            'quick_start_guide_title_en.required'     => 'Quick Start Guide Title (EN) is required',
            'quick_start_guide_title_tc.required'     => 'Quick Start Guide Title (TC) is required',
            'quick_start_guide_title_sc.required'     => 'Quick Start Guide Title (SC) is required',
            'quick_start_guide_content_en.required'     => 'Quick Start Guide Content (EN) is required',
            'quick_start_guide_content_tc.required'     => 'Quick Start Guide Content (TC) is required',
            'quick_start_guide_content_sc.required'     => 'Quick Start Guide Content (SC) is required',
            'booking_title_en.required'     => 'Booking Title (EN) is required',
            'booking_title_tc.required'     => 'Booking Title (TC) is required',
            'booking_title_sc.required'     => 'Booking Title (SC) is required',
            'booking_content_en.required'     => 'Booking Content (EN) is required',
            'booking_content_tc.required'     => 'Booking Content (TC) is required',
            'booking_content_sc.required'     => 'Booking Content (SC) is required',
        ];
    }
}
