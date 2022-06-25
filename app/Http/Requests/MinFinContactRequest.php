<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinFinContactRequest extends FormRequest
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
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:15'],
            'helpline' => ['nullable', 'string', 'max:15'],
            'email' => ['nullable', 'email'],
            'reception' => ['nullable', 'string', 'max:500'],
            'relations_sector' => ['nullable', 'string', 'max:500'],
            'public_reception' => ['nullable', 'string', 'max:500'],
            'google_iframe' => ['nullable', 'string'],
        ];
    }
}
