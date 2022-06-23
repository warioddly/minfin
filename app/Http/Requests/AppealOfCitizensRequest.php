<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppealOfCitizensRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:2000'],
            'region' => ['required', 'string', 'max:20'],
            'district' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email',  'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'last_name' => ['required', 'string', 'max:45'],
            'name' => ['required', 'string', 'max:45'],
        ];
    }
}
