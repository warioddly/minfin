<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'description' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'preview_image' => ['nullable', 'image', 'max:10240'],
            'is_published' => ['nullable', 'string'],
            'content' => ['nullable', 'string', 'max:60000'],
            'page_id' => ['nullable', 'integer'],
            'documents[]' => ['nullable', 'file', 'max:50240'],
        ];
    }
}
