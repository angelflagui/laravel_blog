<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        ];

    }
    public function messages(): array
    {
        return [
            'title.required' => 'title is required',
            'content.required' => 'content is required',
            'image.required' => 'image is required',
            'image.image' => 'image is not valid',
            'image.mimes' => 'image is not valid',
            'image.max' => 'image is not valid',
        ];

    }
}
