<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:10240'],
            'about' => ['nullable', 'string', 'max:120'],
            'password' => ['nullable', 'string', 'min:8'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->id)],
            'roles[]' => ['nullable', 'array', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => __('This email already exists, try another email')
        ];
    }
}
