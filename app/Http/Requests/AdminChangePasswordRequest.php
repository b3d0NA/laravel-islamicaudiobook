<?php

namespace App\Http\Requests;

use App\Rules\MatchAdminOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class AdminChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new MatchAdminOldPassword],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ];
    }
}