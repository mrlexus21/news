<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsListRequest extends FormRequest
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
        return [
            'status' => 'nullable|string|max:255',
            'sort' => 'nullable|string|max:255',
        ];
    }
}
