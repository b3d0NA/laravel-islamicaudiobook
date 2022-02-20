<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|max:255",
            "email" => "required|unique:users,email|email|ends_with:@gmail.com",
            "password" => "required",
            "mobile" => "required|numeric|unique:users,mobile",
            "fb_link" => "nullable|string",
            "gender" => "required|integer",
            "agree" => "required",
        ];
    }

    public function messages()
    {
        return [
            "agree.required" => "Inna Lillah!! You have to agree to our Terms & Conditions",
        ];
    }
}