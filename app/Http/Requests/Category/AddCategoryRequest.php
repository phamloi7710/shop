<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'txtName' => 'required|min:2||max:255|unique:categories,name',
            'sltparentCategory' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => __('validation.required',['attribute'=>__('general.categoryName')]),
            'txtName.unique' => __('validation.exists',['attribute'=>__('general.categoryName')]),
            'txtName.min' => __('validation.min.string',['attribute'=>__('general.categoryName'),'min'=>'2']),
            'txtName.min' => __('validation.max.string',['attribute'=>__('general.categoryName'),'min'=>'255']),
            'sltparentCategory.required' => __('validation.required',['attribute'=>__('general.parentCategory')]),
        ];
    }
}
