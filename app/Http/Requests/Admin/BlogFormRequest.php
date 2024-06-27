<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
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
            'slug_en'     => ["required","unique:blog,slug_en,".$this->blog_id],
            'slug_sc'     => 'required',
            'slug_tc'     => 'required',
            'title_en'     => 'required',
            'title_sc'     => 'required',
            'title_tc'     => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'tag_id' => 'required',
            // 'should_lookat_product_category_id' => 'required',
            'related_products_sub_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slug_en.required'     => 'Slug (EN) is required',
            'slug_sc.required'     => 'Slug (SC) is required',
            'slug_tc.required'     => 'Slug (TC) is required',
            'title_en.required'     => 'Title (EN) is required',
            'title_sc.required'     => 'Title (SC) is required',
            'title_tc.required'     => 'Title (TC) is required',
            'category_id.required' => 'Please choose a category',
            'author_id.required' => 'Please choose an author',
            'tag_id.required' => 'Please choose a tag',
            'should_lookat_product_category_id.required' => 'Please choose Should Lookat Product Category Name',
            'related_products_sub_category_id.required' => 'Please choose Related Products Sub Category Name',
        ];
    }
}
