<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:10240'],
            'about' => ['required', 'string', 'max:120'],
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required', 'email', 'unique:users,email'],
            'roles[]' => ['nullable', 'array', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => __('This email already exists, try another email'),
            'about' => __('This email already exists, try another email')
        ];
    }
}
