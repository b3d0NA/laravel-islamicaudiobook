<?php

namespace App\Http\Requests;

use App\Rules\MatchUserOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new MatchUserOldPassword],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Inna Lillah! Current password must be filled to change password.',
            'new_password.required' => 'Inna Lillah! New Password must be filled.',
            'confirm_new_password.same' => 'Inna Lillah! Password confirmation does not match.',
        ];
    }
}