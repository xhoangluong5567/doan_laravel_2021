<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // 'username' => 'required|min:2|max:100',
            // 'email' => 'required|min:5|max:100',
            // 'password' => 'required|min:3|max:150'
        ];
    }
        public function messages()
        {
            return [
                // 'username.required' => trans('user.errors.username.required'),
                // 'username.min' => trans('user.errors.username.min'),
                // 'username.max' => trans('user.errors.username.max'),
                // 'username.unique' => trans('user.errors.username.unique'),
                
                // 'email.required' => trans('user.errors.email.required'),
                // 'email.min' => trans('user.errors.email.min'),
                // 'email.max' => trans('user.errors.email.max'),
                // 'email.unique' => trans('user.errors.email.unique'),
                
                // 'password.required' => trans('user.errors.name.required'),
                // 'password.min' => trans('user.errors.name.min'),
                // 'password.max' => trans('user.errors.address.max')
            ];
        }
}
