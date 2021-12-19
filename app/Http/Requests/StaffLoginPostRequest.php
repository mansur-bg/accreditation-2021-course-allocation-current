<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffLoginPostRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please enter username',
//            'username.email' => 'Username must be a valid email',
            'password.required' => 'Provide your password',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }
}
