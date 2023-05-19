<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => [
                'string',
                'required',
                'min:3',
                'max:255',
                'unique:posts,title'
            ],
            'slug' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
                'unique:posts,slug'
            ],
            'category_id' => 'integer|required|exists:\App\Models\Category,id',
            'excerpt' => 'string|min:3|max:400|required',
            'content' => 'string|min:3|max:10000|required',
            'image' => 'image|nullable',
        ];
    }
}
