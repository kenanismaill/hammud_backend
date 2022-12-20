<?php

namespace App\Http\Requests\Api\v1\Category;

use Illuminate\Foundation\Http\FormRequest;

class IndexCategoryRequest extends FormRequest
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
            'per_page' => [
                'nullable',
                'integer',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'content' => [
                'nullable',
                'string',
            ],
            'color' => [
                'nullable',
                'string',
            ]
        ];
    }
}
