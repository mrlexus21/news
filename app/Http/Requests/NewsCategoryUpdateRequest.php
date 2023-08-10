<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewsCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()->hasAnyRole(['admin', 'Chief-editor'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //'name' => 'string|required|min:3|unique:categories,name',
            'name' => 'string|required|min:3|unique:categories,name,' . $this->category_id,
            'slug' => 'string|required|max:255|unique:categories,slug,' . $this->category_id,
            'description' => 'string'
        ];
    }
}
