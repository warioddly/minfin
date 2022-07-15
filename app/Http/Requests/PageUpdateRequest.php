<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:45', Rule::unique('pages', 'title')->ignore(request()->route('id'))],
            'description' => ['required', 'string', 'max:700'],
            'parent_id' => ['required', 'string', 'exists:pages,id', 'not_in:' . request()->route('id')],
            'icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:10240'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => __('This is title already exists, try another name')
        ];
    }
}
