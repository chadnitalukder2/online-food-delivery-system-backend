<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // Adjust this based on your authorization logic.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Common rules for both store and update
        $rules = [
            'restaurant_id' => 'sometimes|exists:restaurants,id',  // Optional for update
            'name' => 'sometimes|string|max:255',  // Optional for update
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'image' => 'nullable|string',
            'availability' => 'sometimes|string|in:available,unavailable',
        ];

        // Adjust required rules for POST (store operation)
        if ($this->isMethod('POST')) {
            $rules['restaurant_id'] = 'required|exists:restaurants,id';
            $rules['name'] = 'required|string|max:255';
            $rules['price'] = 'required|numeric|min:0';
            $rules['availability'] = 'required|string|in:available,unavailable';
        }
        
        return $rules;
    }
}

