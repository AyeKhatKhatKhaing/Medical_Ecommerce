<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomeFormRequest extends FormRequest
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
            // 'banner_title_en'    => 'required',
            // 'banner_title_sc'    => 'required',
            // 'banner_title_tc'    => 'required',
            // 'promotion_title_en' => 'required',
            // 'promotion_title_sc' => 'required',
            // 'promotion_title_tc' => 'required',
            // 'member_reward_title_en' => 'required',
            // 'member_reward_title_sc' => 'required',
            // 'member_reward_title_tc' => 'required',
        ];
    }

    public function messaeges()
    {
        return [
            // 'banner_title_en'    => 'Banner Title is required',
            // 'banner_title_sc'    => 'Banner Title is required',
            // 'banner_title_tc'    => 'Banner Title is required',
            // 'promotion_title_en' => 'Promation Title is required',
            // 'promotion_title_sc' => 'Promation Title is required',
            // 'promotion_title_tc' => 'Promation Title is required',
            // 'member_reward_title_en' => 'Member Reward Title is required',
            // 'member_reward_title_sc' => 'Member Reward Title is required',
            // 'member_reward_title_tc' => 'Member Reward Title is required',
        ];
    }
}
