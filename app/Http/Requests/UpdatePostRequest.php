<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
                Rule::unique('posts')->ignore($this->route()->post)
            ],
            'slug' => [
                'string',
                'required',
                'min:3',
                'max:255',
                'nullable',
                Rule::unique('posts')->ignore($this->route()->post)
            ],
            'category_id' => 'integer|required|exists:\App\Models\Category,id',
            'excerpt' => 'string|min:3|max:400|required',
            'content' => 'string|min:3|max:10000|required',
            'is_published' => 'in:0,1',
            'popular' => 'in:0,1',
            'main_slider' => 'in:0,1',
            'image' => 'image|nullable',
        ];
    }
}
