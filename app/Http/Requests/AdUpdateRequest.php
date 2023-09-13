<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()?->hasAnyRole('admin')) {
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
            'link' => [
                'string',
                'required',
                'min:1',
                'max:255',
            ],
            'type' => [
                'string',
                'required',
                'min:3',
                'max:255',
            ],
            'showdate_start' => [
                'date'
            ],
            'showdate_end' => [
                'date',
                'after:showdate_start',
            ],
            'image' => 'image|nullable',
        ];
    }
}
