<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required'],
            "address" => ['required'],
            "city" => ['required'],
            "state" => ['required'],
            "country" => ['required'],
            "phoneNumber" => ['required'],
            "shippingMethod" => ['required'],
            "zipCode" => ['required'],
            "payment_method" => ['required'],
            "amount" => ['required'],
        ];
    }
}
