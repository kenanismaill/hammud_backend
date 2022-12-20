<?php

namespace App\Http\Requests\Api\v1\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'nullable',
                'string',
                'max:50'
            ],
            'sku' => [
                'nullable',
                'string',
                'max:50'
            ],
            'price' => [
                'nullable',
                'numeric',
            ],
            'is_tax_exempt' => [
                'nullable',
                'boolean',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'is_kitchen_item' => [
                'nullable',
                'boolean',
            ],
            'description' =>  [
                'nullable',
                'string',
            ],
            'discount_id' => [
                'nullable',
                Rule::exists('discounts', 'id')
            ]
        ];
    }
}
