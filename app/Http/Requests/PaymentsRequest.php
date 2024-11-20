<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'order_id' => 'sometimes|exists:orders,id', 
            'amount' => 'sometimes|numeric|min:0',
            'payment_method' => 'sometimes|in:cash,card,paypal',
            'status' => 'sometimes|string|in:pending,completed,canceled',
        ];

        if ($this->isMethod('POST')) {
            $rules['order_id'] = 'required|exists:orders,id';
            $rules['amount'] = 'required|numeric|min:0';
            $rules['status'] = 'required|string|in:pending,completed,canceled';
            $rules['payment_method'] = 'required|in:cash,card,paypal';
        }

        return $rules;
    }
}
