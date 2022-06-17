<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', Rule::unique('categories', 'title')->ignore($this->id)],
            'publisher' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => __('This is category already exists, try another name')
        ];
    }
}
