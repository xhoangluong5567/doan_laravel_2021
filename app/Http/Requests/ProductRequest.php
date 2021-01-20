<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'images' => 'required',
            'desc' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('product.errors.name.required'),
            'name.min' => trans('product.errors.name.min'),
            'name.max' => trans('product.errors.name.max'),
            'images.required'=> trans('product.errors.images.required')

        ];
    }
}
