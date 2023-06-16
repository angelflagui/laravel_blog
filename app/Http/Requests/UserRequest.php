<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->id,
            'role' => 'required',
            'password' => 'required',

        ];
    }

    function messages(): array
    {
        return [
            'name.required' => 'name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'this email is already taken',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
        ];
    }
}
