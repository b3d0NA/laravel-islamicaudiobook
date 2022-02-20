<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            "why_cant_buy_book" => "required",
            "monthly_mobile_costs" => "required",
            "occupation" => "required",
            "internet_speed" => "required",
            "is_promised" => "required",
        ];
    }

    public function messages()
    {
        return [
            'why_cant_buy_book.required' => 'ইন্না লিল্লাহ! আপনাকে আপনি কেনো বই কিনতে পারেন না তার উত্তর দিতে হবে ',
            'monthly_mobile_costs.required' => 'ইন্না লিল্লাহ! আপনার মাসিক মোবাইল খরচ আমাদের জানাতে হবে ',
            'occupation.required' => 'আপনার পেশা জানান',
            'internet_speed.required' => 'আপনার ইন্টারনেট স্পিড জানানো খুবই গুরুত্বপূর্ণ ',
            'is_promised.required' => 'ইন্না লিল্লাহ! আপনি কি আমাদের ওয়াদা করবেন না? ',
        ];
    }
}