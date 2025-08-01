<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|string|min:5|max:50',
            'price' => 'required|numeric|min:2.0|max:100.0',
            'description' => 'nullable|string',
            'stock' => 'required|boolean',
            'product_image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array {
        return [
            'name.min' => 'প্রোডাক্টের নাম মিনিমাম ৫ অক্ষর হতে হবে',
            'price.required' => 'মূল্য দিতেই হবে',
            'price.min' => 'একটা প্রোডাক্টের মিনিমাম প্রাইস ২ টাকা হতে হবে'
        ];
    }
}
