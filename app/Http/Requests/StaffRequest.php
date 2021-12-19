<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StaffRequest extends FormRequest
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
//        id, staff_number, title, name, phone_number, email, username, password, is_default_password, photo, status, `rank`, qualifications, specialisation, cadre, created_at, updated_at, deleted_at
        return [
            "staff_number" => "required",
            "title" => "sometimes|nullable",
            "name" => "required",
            "rank" => "required",
            "phone_number" => "sometimes|nullable",
//            "username" => "required|email|ends_with:@ccuk.edu.ng|unique:App\Models\Staff,username",
            "email" => "required|email",//unique:App\Models\Staff,email,".$this->get('staff_number'),
            "status" => "sometimes|nullable",
            "qualifications" => "sometimes|nullable",
            "specialisation" => "required",
        ];
    }
    public function messages()
    {
        return [
            "staff_number.required" => "Staff Number is required",
            "title.required" => "",
            "name.required" => "Staff Name is required",
            "rank.required" => "Staff Rank is required",
            "phone_number.required" => "",
            "email.required" => "Email is required",
            "email.email" => "Invalid email",
//            "email.unique" => "Email has already been taken",
            "status.required" => "",
            "qualifications.required" => "",
            "specialisation.required" => "Please provide Specialisation",
        ];
    }

//    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
//    {
//        $response = response()->json(['error' => $validator->errors()]);
//
//        throw (new ValidationException($validator, $response))
//            ->errorBag($this->errorBag)
//            ->redirectTo($this->getRedirectUrl());
//    }

}
