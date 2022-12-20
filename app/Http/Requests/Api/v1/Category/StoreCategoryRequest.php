<?php

namespace App\Http\Requests\Api\v1\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'status' => [
                'nullable',
                'boolean',
            ],
            'name' => [
                'required',
                'string',
                'max:50',
            ],
            'description' => [
                'required',
                'string',
                'max:150',
            ],
            'color' => [
                'nullable',
                'string',
            ]
        ];
    }
}
