<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50', 'unique:pages,title'],
            'description' => ['required', 'string', 'max:500', 'unique:pages,title'],
            'icon' => ['nullable', 'image', 'max:10240'],
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => __('This is title already exists, try another name')
        ];
    }
}
