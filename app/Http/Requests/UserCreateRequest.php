<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()?->hasAnyRole(['admin'])) {
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
            'name' => [
                'string',
                'required',
                'min:3',
                'max:255',
            ],
            'email' => [
                'email',
                'required',
                'min:3',
                'max:255',
                'nullable',
                Rule::unique('users', 'email')
            ],
            'password' => 'string|required|min:8|max:255',
            'role_id' => 'integer|required|exists:\App\Models\Role,id',
            'image' => 'image|nullable',
        ];
    }
}
