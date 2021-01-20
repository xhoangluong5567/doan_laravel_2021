<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('brand.errors.name.required'),
            'name.min' => trans('brand.errors.name.min'),
            'name.max' => trans('brand.errors.name.max')
        ];
    }
}
